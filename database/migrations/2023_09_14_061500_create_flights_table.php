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
        Schema::create('laravel_amuzs', function (Blueprint $table) {
            $table->id();
            $table->timestamps(); //날짜
            $table->string("title"); //테이블 이름 지정
            $table->string("text"); //테이블 이름 지정
            $table->string("name");
            $table->string("UserKey");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laravel_amuzs');
    }
};
