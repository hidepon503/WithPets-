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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('owner_name');
            $table->string('name');
            //７字の郵便番号を設定。それ以外はエラー
            $table->integer('postcode');
            $table->string('prefecture');
            $table->string('address');
            $table->string('tel');
            $table->string('password');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            // 下記は、nullも許容する。
            $table->string('owner_birthday')->nullable();
            $table->string('image')->nullable();
            $table->string('owner_image')->nullable();
            $table->string('introduction')->nullable();
            $table->string('url')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('line')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('pinterest')->nullable();
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
