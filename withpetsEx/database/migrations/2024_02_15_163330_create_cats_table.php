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
        Schema::create('cats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->integer('age');
            $table->integer('status_id')->constrained()->cascadeOnDelete();
            $table->foreignId('kind_id')->constrained()->cascadeOnDelete();
            $table->foreignId('gender_id')->constrained()->cascadeOnDelete();
            $table->string('desc')->nullable();
            // 画像を保存するカラムを追加。nullも許容する。メイン画像になる
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cats');
    }
};
