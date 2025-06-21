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
            $table->string('product_uid')->unique();
            $table->string('category_uid')->index();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('short_desc')->nullable();
            $table->decimal('mrp', 10, 2);
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('selling_price', 10, 2);
            $table->integer('available_qty')->default(0);
            $table->string('sku')->unique()->nullable();
            $table->string('thumbnail')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_desc')->nullable();
            $table->text('seo_keyword')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes(); // enables soft deletion
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
