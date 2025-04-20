<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\FavouriteController;
use App\Http\Controllers\Api\DonationRequestController;
use App\Http\Controllers\Api\MainController;
use App\Http\Controllers\Api\NotificationSettingController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
<<<<<<< HEAD
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// ✅ Routes without auth
Route::prefix('v1')->group(function () {
    Route::get('cities', [MainController::class, 'cities']);
    Route::get('governorates', [MainController::class, 'governorates']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/send-reset-code', [AuthController::class, 'sendResetCode']);
    Route::post('/reset-password', [AuthController::class, 'resetPassword']);

    // ✅ Routes with auth:sanctum
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
        Route::post('/logout', [AuthController::class, 'logout']);


        Route::get('/profile', [ProfileController::class, 'profile']);
        Route::post('/update-profile', [ProfileController::class, 'updateProfile']);
        Route::post('/change-password', [ProfileController::class, 'changePassword']);
        Route::post('/register-token', [ProfileController::class, 'registerToken']);
        Route::post('/remove-token', [ProfileController::class, 'removeToken']);



        Route::get('/favourites', [FavouriteController::class, 'index']);
        Route::post('/favourites/{postId}', [FavouriteController::class, 'store']);
        Route::delete('/favourites/{postId}', [FavouriteController::class, 'destroy']);




        Route::get('/donationrequests', [DonationRequestController::class, 'index']); // عرض كل الطلبات
        Route::post('/donationrequests', [DonationRequestController::class, 'store']); // إضافة طلب
        Route::put('/donationrequests/{id}', [DonationRequestController::class, 'update']); // تحديث طلب
        Route::delete('/donationrequests/{id}', [DonationRequestController::class, 'destroy']); // حذف طلب



        Route::post('/notification-settings', [NotificationSettingController::class, 'store']);

    });


});
