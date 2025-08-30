<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Services\SchemaGenerator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Validate tab; default to published
        $tab = $request->query('tab', 'published');
        if (! in_array($tab, ['published', 'draft'], true)) {
            $tab = 'published';
        }

        $this->data['tab'] = $tab; // get data of current active tab
        $products = Product::query()
            ->when($tab === 'published', function ($q) {
                $q->where('status', 'published')
                    ->whereNotNull('published_at')
                    ->where('published_at', '<=', now());
            })
            ->when($tab === 'draft', function ($q) {
                $q->where('status', 'draft');
            })
            ->with(['category']) // adjust relations as needed
            ->when($tab === 'published',
                fn ($q) => $q->latest('published_at'),
                fn ($q) => $q->latest('id')
            );
        
        $this->data['products'] = $products->paginate(10)->withQueryString();

        // Optional: counts for tab badges (cached)
        $this->data['counts'] = cache()->remember('product_tab_counts', 60, function () {
            return [
                'published' => Product::where('status', 'published')
                    ->whereNotNull('published_at')
                    ->where('published_at', '<=', now())
                    ->count(),
                'draft' => Product::where('status', 'draft')->count(),
            ];
        });

        return view('admin.product.manage', $this->data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['categories'] = Category::all();
        $this->data['product_uid'] = Str::uuid()->toString();
        return view('admin.product.add', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_uid'       => [
                                    'required',
                                    'uuid',
                                    Rule::exists('products', 'product_uid'),
                                ],
            'title'             => 'required|string|max:255',
            'slug'              => [
                                    'required',
                                    'string',
                                    'max:255',
                                    'alpha_dash',
                                    Rule::unique('products', 'slug')->ignore($request->product_uid, 'product_uid'),
                                ],
            'short_desc'        => 'nullable|string|max:500',
            'description'       => 'nullable|string',
            'seo_title'         => 'nullable|string|max:255',
            'seo_keyword'       => 'nullable|string|max:255',
            'seo_desc'          => 'nullable|string|max:255',
            'product_schema'    => 'nullable|string',
            'status'            => 'required|in:Published,Draft,Inactive',
            'category_uid'      => [
                                    'required',
                                    'uuid',
                                    Rule::exists('categories', 'category_uid'),
                                ],
            'sku'               => [
                                    'required',
                                    'string',
                                    'max:100',
                                    Rule::unique('products', 'sku')->ignore($request->product_uid, 'product_uid'),
                                ],

            'available_qty'     => 'required|integer|min:0',
            'mrp'               => 'required|numeric|min:0',
            'selling_price'     => 'required|numeric|min:0|lte:mrp',
            'discount'          => 'nullable|numeric|min:0|max:100',
            'tags'              => 'nullable|string|max:500',
            'thumbnail'         => [
                                    Rule::requiredIf(function () use ($request) {
                                        $product = \App\Models\Product::where('product_uid', $request->product_uid)->first();
                                        return empty($product?->thumbnail); // require if no thumbnail yet
                                    }),
                                    'image',
                                    'mimes:jpg,jpeg,png,webp',
                                    'max:20480',
                                ]
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.edit-product', ['product_uid' => $request->product_uid])
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validated();

        $product = Product::where('product_uid', $validatedData['product_uid'])->firstOrFail();
        $directory = 'product/' . $validatedData['product_uid'];
        if (!Storage::disk('public')->exists($directory)) {
            Storage::disk('public')->makeDirectory($directory);
        }

        // Upload thumbnail
        $thumbnail_url = null;
        if ($request->hasFile('thumbnail')) {
            $thumb = $request->file('thumbnail');
            $filename = Str::random(20) . '-' . time() . '.' . $thumb->getClientOriginalExtension();
            $path = $thumb->storeAs($directory, $filename, 'public');
            $validatedData['thumbnail'] = Storage::url($path);
        }

        if(!empty($validatedData['product_schema'])){
            $validatedData['product_schema'] = json_encode(SchemaGenerator::product($validatedData));
        }

        $validatedData['published_at'] = date('Y-m-d H:i:s');
        $product_update_result = $product->update($validatedData);
        if($product_update_result){
            cache()->forget('product_tab_counts');
            return redirect()->route('admin.manage-products', ['tab' => 'published'])->with('success', 'Product Created Successfully!');
        }else{
            return redirect()->route('admin.edit-products', $validatedData['product_uid'])->with('error', 'Something Went Wrong, Try again later!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($product_uid)
    {
        $this->data['categories'] = Category::all();
        $this->data['product'] = Product::where('product_uid', $product_uid)->first();

        if($this->data['product'] == null){
            return redirect()->route('admin.product.manage')->with('error', 'Invalid Product Request!');
        }
        return view('admin.product.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        return view('admin.product.edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function update_draft_product_gallery_files(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,webp|max:20480',
            'product_uid' => 'required|string',
        ]);

        // Try to fetch existing product or create a draft one
        $product = Product::firstOrCreate([
            'product_uid' => $request->product_uid,
        ], [
            'status' => 'draft'
        ]);

        $file = $request->file('file');
        $product_uid = $request->product_uid;
        $directory = 'product/' . $product_uid;
        if (!Storage::disk('public')->exists($directory)) {
            Storage::disk('public')->makeDirectory($directory);
        }

        $filename = Str::random(20) . '-' . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs($directory, $filename, 'public');
        $file_url = Storage::url($path);

        $product = Product::where('product_uid', $product_uid)->first();
        $gallery = $product->gallery ?? [];
        $gallery[] = $file_url;
        $product->gallery = $gallery;
        $product->save();

        return response()->json([
            'success' => true,
            'filename' => $file->getClientOriginalName(), // show to user
            'uniquefilname' => $filename,
            'url' => $file_url
        ]);
    }

    public function delete_draft_product_gallery_files(Request $request)
    {
        $request->validate([
            'product_uid' => 'required|string|exists:products,product_uid',
            'filename' => 'required|string',
        ]);

        $product = Product::where('product_uid', $request->product_uid)->first();

        if (!$product || !is_array($product->gallery)) {
            return response()->json(['success' => false, 'message' => 'Gallery not found.'], 404);
        }

        $filename = $request->filename;
        $directory = 'product/' . $product->product_uid;
        $fullPath = $directory . '/' . $filename;

        // Delete file from disk if exists
        if (Storage::disk('public')->exists($fullPath)) {
            Storage::disk('public')->delete($fullPath);
        }

        // Remove from gallery array
        $updated_gallery = array_values(array_filter($product->gallery, function ($item) use ($filename) {
            return basename($item) !== $filename;
        }));

        $product->gallery = $updated_gallery;
        $product->save();

        return response()->json(['success' => true]);
    }

    public function product_draft_init(Request $request){
        $request->validate([
            'product_uid' => 'required|string',
        ]);

        Product::updateOrCreate(
            ['product_uid' => $request->product_uid],
            ['title' => $request->title ?? null, 'status' => 'draft']
        );

        return response()->json(['success' => true]);
    }
}
