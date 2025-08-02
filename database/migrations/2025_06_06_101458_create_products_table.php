<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // Identifiers
            $table->string('product_uid')->unique();
            $table->string('category_uid')->index();

            // Product details
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description');
            $table->text('short_desc')->nullable();

            // Pricing
            $table->decimal('mrp', 10, 2);
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('selling_price', 10, 2);

            // Stock
            $table->integer('available_qty')->default(0);
            $table->string('sku')->unique()->nullable();

            // Media
            $table->string('thumbnail')->nullable();

            // Flags
            $table->boolean('is_featured')->default(false);

            // Additional fields
            $table->string('dimension')->nullable(); // could also be JSON if you prefer structured length/width/height
            $table->text('product_schema')->nullable(); // for rich snippets
            $table->json('tags')->nullable(); // tags as JSON array
            $table->json('attributes')->nullable(); // attributes like color, size, etc.
            $table->string('canonical_url')->nullable();

            // SEO
            $table->text('seo_title')->nullable();
            $table->text('seo_desc')->nullable();
            $table->text('seo_keyword')->nullable();

            // Meta
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamp('published_at')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            // Timestamps & Soft Deletes
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
