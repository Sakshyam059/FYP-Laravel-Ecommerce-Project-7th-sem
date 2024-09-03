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
            $table->string('name')->unique();
            $table->string('slug',150)->unique();
            $table->string('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();;
            $table->foreignId('subcategory_id')->constrained('subcategories')->cascadeOnDelete();
            $table->foreignId('brand_id')->constrained('brands')->cascadeOnDelete();
            $table->string('price');
            $table->decimal('discount_value',10,2)->nullable()->default(0);
            $table->string('discount_type')->nullable();
            $table->boolean('trending')->nullable()->default(0);
            $table->string('tags')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
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
