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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('instructor_id');
            $table->text('course_name')->nullable();
            $table->string('course_image')->nullable();
            $table->string('course_name_slug')->nullable();
            $table->text('course_meta_description')->nullable();
            $table->longText('course_content')->nullable();
            $table->longText('course_description')->nullable();
            $table->longText('requirements')->nullable();

            $table->string('video')->nullable();
            $table->string('language')->nullable();
            $table->string('duration')->nullable();
            $table->string('certificate')->nullable();
            $table->integer('selling_price')->nullable();
            $table->integer('discount_price')->nullable();

            $table->string('bestseller')->nullable();
            $table->string('featured')->nullable();
            $table->string('highestrated')->nullable();
            $table->enum('status', ['0', '1'])->default('0')->comment('0=Inactive, 1=Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
