<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->text('meta_title')->change();
            $table->text('meta_description')->change();
            $table->text('meta_keywords')->change();
        });
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('meta_title', 255)->change();
            $table->string('meta_description', 255)->change();
            $table->string('meta_keywords', 255)->change();
        });
    }
};
