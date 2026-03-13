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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title1');             // Main title
            $table->string('title2');
            $table->string('subtitle');             // Subtitle or secondary title
            $table->text('description')->nullable(); // Optional description
            $table->string('image');              // Slider image path
            $table->boolean('is_active')->default(true); // Optional: active toggle
            $table->integer('order')->default(0); // Optional: slider order
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
