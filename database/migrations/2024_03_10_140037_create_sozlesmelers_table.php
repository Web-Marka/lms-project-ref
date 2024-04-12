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
        Schema::create('sozlesmelers', function (Blueprint $table) {
            $table->id();
            $table->longText('gizlilik_politikasi')->nullable();
            $table->longText('cerez_politikasi')->nullable();
            $table->longText('mesafeli_satis_sozlesmesi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sozlesmelers');
    }
};
