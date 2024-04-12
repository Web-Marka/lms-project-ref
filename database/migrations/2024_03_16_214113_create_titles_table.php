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
        Schema::create('titles', function (Blueprint $table) {
            $table->id();
            $table->string('banner_text_first')->nullable();
            $table->string('banner_text_second')->nullable();
            $table->string('main_image')->nullable();
            $table->string('badge_title')->nullable();
            $table->text('h1_title')->nullable();
            $table->text('h1_desc')->nullable();
            $table->text('category_badge')->nullable();
            $table->text('category_title')->nullable();
            $table->text('counter_badge')->nullable();
            $table->text('counter_title')->nullable();
            $table->string('counter_first')->nullable();
            $table->string('counter_first_desc')->nullable();
            $table->string('counter_second')->nullable();
            $table->string('counter_second_desc')->nullable();
            $table->string('counter_third')->nullable();
            $table->string('counter_third_desc')->nullable();
            $table->string('counter_fourth')->nullable();
            $table->string('counter_fourth_desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('titles');
    }
};
