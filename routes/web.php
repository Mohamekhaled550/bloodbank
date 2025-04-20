<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/donationrequests', [App\Http\Controllers\DonationRequestController::class, 'index'])->name('donationrequests.index');

Route::get('/donationrequests/create', [App\Http\Controllers\DonationRequestController::class, 'create'])->name('donationrequests.create');
Route::post('/donationrequests', [App\Http\Controllers\DonationRequestController::class, 'store'])->name('donationrequests.store');

Route::get('/donationrequests/{id}/edit', [App\Http\Controllers\DonationRequestController::class, 'edit'])->name('donationrequests.edit');
Route::put('/donationrequests/{id}', [App\Http\Controllers\DonationRequestController::class, 'update'])->name('donationrequests.update');

Route::get('/donationrequests/{id}', [App\Http\Controllers\DonationRequestController::class, 'show'])->name('donationrequests.show');

Route::delete('/donationrequests/{id}', [App\Http\Controllers\DonationRequestController::class, 'destroy'])->name('donationrequests.destroy');

Route::get('/bloodtypes', [App\Http\Controllers\BloodTypeController::class, 'index'])->name('bloodtypes.index');
