<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\MakerController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ApplianceController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\ImagedController;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('test', function () {
    return Inertia::render('Image/create');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('history', HistoryController::class);

Route::get('/config', [ConfigController::class, 'index'])->name('config.index');

Route::resource('category', CategoryController::class);

Route::resource('maker', MakerController::class);

Route::resource('company', CompanyController::class);

Route::resource('shop', ShopController::class);

Route::resource('appliance', ApplianceController::class);

Route::resource('record', RecordController::class);

Route::resource('image', ImageController::class);

require __DIR__.'/auth.php';
