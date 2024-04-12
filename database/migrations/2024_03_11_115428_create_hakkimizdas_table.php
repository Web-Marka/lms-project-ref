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
        Schema::create('hakkimizdas', function (Blueprint $table) {
            $table->id();
            $table->string('img_small')->nullable();
            $table->string('img_medium')->nullable();
            $table->string('img_large')->nullable();
            $table->string('main_title')->nullable();
            $table->text('main_desc')->nullable();
            $table->string('main_mini_title_first')->nullable();
            $table->text('main_mini_title_first_desc')->nullable();
            $table->string('main_mini_title_second')->nullable();
            $table->text('main_mini_title_second_desc')->nullable();
            $table->string('second_title')->nullable();
            $table->text('second_desc')->nullable();
            $table->string('third_title')->nullable();
            $table->text('third_desc_one')->nullable();
            $table->text('third_desc_two')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hakkimizdas');
    }
};
