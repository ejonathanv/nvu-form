<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ZoomDateController;
use App\Http\Controllers\DashboardController;

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::redirect('/ref', '/', 301);
Route::get('/ref/{referido}', [WebsiteController::class, 'index'])->name('referral');
Route::post('registro', [RegisterController::class, 'store'])->name('register.store');


Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'verified']], function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('registers', RegisterController::class)->only(['index', 'show', 'destroy']);
    Route::resource('zoom-dates', ZoomDateController::class);
    Route::put('zoom-dates/{zoom_date}/end', [ZoomDateController::class, 'end'])->name('end-presentation');
    Route::post('zoom-dates/{zoom_date}/export', [ZoomDateController::class, 'export'])->name('download-registers');
    Route::resource('referrals', ReferralController::class);
    Route::resource('registers', RegisterController::class);
    Route::post('download-all-registers', [RegisterController::class, 'downloadAllRegisters'])->name('download-all-registers');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
