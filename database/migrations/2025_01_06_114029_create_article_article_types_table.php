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
        Schema::create('article_article_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->foreignId('article_type_id');
            $table->foreign('article_type_id')->references('id')->on('article_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_article_types');
    }
};
