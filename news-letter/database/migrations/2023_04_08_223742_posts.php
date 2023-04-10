<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * O que a migração executará
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('tittle', 100);
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Usado para reverter a migração.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
