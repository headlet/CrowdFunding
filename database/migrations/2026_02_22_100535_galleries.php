<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('gallery_categories')->nullOnDelete();
            $table->string('title', 100);
            $table->string('image');
            $table->string('alt_text')->nullable();
            $table->text('caption')->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0)->index();
            $table->boolean('featured')->default(false)->index();
            $table->boolean('status')->default(true)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};