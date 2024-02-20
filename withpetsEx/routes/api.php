<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CatController;


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
// ログアウトのためのルートを追加
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);

// 猫のリソースルートを作成
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('cats', CatController::class)->only([
        'index', 'create', 'store', 'show', 'edit', 'update', 'destroy'
    ]);
});
