<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register', [AuthController::class, 'register']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// <!-- 

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
// // auth.phpで定義されている認証ルートを使用
// use App\Http\Controllers\Auth\AuthenticatedSessionController;
// use App\Http\Controllers\Auth\ConfirmablePasswordController;
// use App\Http\Controllers\Auth\EmailVerificationNotificationController;
// use App\Http\Controllers\Auth\EmailVerificationPromptController;
// use App\Http\Controllers\Auth\NewPasswordController;
// use App\Http\Controllers\Auth\PasswordController;
// use App\Http\Controllers\Auth\PasswordResetLinkController;
// use App\Http\Controllers\Auth\RegisteredUserController;
// use App\Http\Controllers\Auth\VerifyEmailController;
// // channels.phpで定義されているBroadcastの認証ルートを使用
// use Illuminate\Support\Facades\Broadcast;
// // consoles.phpで定義されているコンソールコマンドを使用
// use Illuminate\Foundation\Inspiring;
// use Illuminate\Support\Facades\Artisan;
// // CatController
// use App\Http\Controllers\CatController;
// // Controller
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\Controller;
// use App\Models\Cat;
// use App\Models\User;


// // auth.php
//     Route::middleware('guest')->group(function () {
//         Route::get('register', [RegisteredUserController::class, 'create'])
//                     ->name('register');
//         Route::post('register', [RegisteredUserController::class, 'store']);
//         Route::get('login', [AuthenticatedSessionController::class, 'create'])
//                     ->name('login');
//         Route::post('login', [AuthenticatedSessionController::class, 'store']);
//         Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
//                     ->name('password.request');
//         Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
//                     ->name('password.email');
//         Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
//                     ->name('password.reset');
//         Route::post('reset-password', [NewPasswordController::class, 'store'])
//                     ->name('password.store');
//     });

//     Route::middleware('auth')->group(function () {
//         Route::get('verify-email', EmailVerificationPromptController::class)
//                     ->name('verification.notice');
//         Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
//                     ->middleware(['signed', 'throttle:6,1'])
//                     ->name('verification.verify');
//         Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//                     ->middleware('throttle:6,1')
//                     ->name('verification.send');
//         Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
//                     ->name('password.confirm');
//         Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
//         Route::put('password', [PasswordController::class, 'update'])->name('password.update');
//         Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
//                     ->name('logout');
//     });

// // channels.php
//     Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//         return (int) $user->id === (int) $id;
//     });

// //consoles.php
//     Artisan::command('inspire', function () {
//         $this->comment(Inspiring::quote());
//     })->purpose('Display an inspiring quote'); 
// //web.php
//     Route::middleware('guest')->group(function () {
//         Route::get('/', [CatController::class, 'publicIndex'])->name('publicIndex');
//         Route::get('/public/{cat}', [CatController::class, 'publicShow'])->name('publicShow');    
//     });


//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->middleware(['auth', 'verified'])->name('dashboard');

//     Route::middleware('auth')->group(function () {
//         Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//         Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//         Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//         // 猫の登録ページをリソースルートで作成
//         //onlyメソッドで使用するアクションを指定することで、不要なアクションを無効化
//         Route::resource('cats', CatController::class)->only([
//             'index', 'create', 'store', 'show', 'edit', 'update', 'destroy'
//         ]);
//     });

//     require __DIR__.'/auth.php';




// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


//  -->
