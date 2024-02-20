<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CatController;

use App\Models\Cat;
use App\Models\User;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/', [CatController::class, 'publicIndex'])->name('publicIndex');
    Route::get('/public/{cat}', [CatController::class, 'publicShow'])->name('publicShow');    
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 猫の登録ページをリソースルートで作成
    //onlyメソッドで使用するアクションを指定することで、不要なアクションを無効化
    Route::resource('cats', CatController::class)->only([
        'index', 'create', 'store', 'show', 'edit', 'update', 'destroy'
    ]);
});

require __DIR__.'/auth.php';
