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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('blogcat_id');
            $table->string('blog_title')->nullable();
            $table->string('blog_slug')->nullable();
            $table->string('blog_image')->nullable();
            $table->string('blog_tags')->nullable();
            $table->longText('blog_content')->nullable();
            $table->text('blog_meta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
