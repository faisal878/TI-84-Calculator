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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            // Basic info
            $table->string('name'); // Category name e.g. "Web Development"
            $table->string('slug')->unique(); // SEO URL e.g. "web-development"

            // Optional description for UI/SEO
            $table->text('description')->nullable();

            // ✅ SEO fields
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();

            // Image or icon (optional)
            $table->string('image')->nullable();

            // Parent category (for subcategories)
            $table->foreignId('parent_id')->nullable()->constrained('categories')->onDelete('cascade');

            // Status & timestamps
            $table->boolean('is_active')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
