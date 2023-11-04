<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\Pigeon\PigeonGetNewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TownController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::redirect('/', '/news');

Route::get('/example', static function () {
    return Inertia::render('Example');
})->name('example');

Route::get('/informations/tos', static function () {
    return Inertia::render('Informations/Tos');
})->name('informations.tos');

Route::get('/informations/gdpr', static function () {
    return Inertia::render('Informations/Gdpr');
})->name('informations.gdpr');

Route::get('/informations/legal-notice', static function () {
    return Inertia::render('Informations/LegalNotice');
})->name('informations.legal-notice');

Route::get('/informations/about', static function () {
    return Inertia::render('Informations/About');
})->name('informations.about');

Route::get('/informations/editorial-charter', static function () {
    return Inertia::render('Informations/EditorialCharter');
})->name('informations.editorial-charter');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('news', NewsController::class);

    Route::post('/pigeon/get/{news}', PigeonGetNewsController::class)->name('pigeon.get-news');

    Route::post('/town/leave', [TownController::class, 'leave'])->name('town.leave');
    Route::get('/town/create', [TownController::class, 'create'])->name('town.create');
    Route::post('/town', [TownController::class, 'store'])->name('town.store');
    Route::get('/town', [TownController::class, 'show'])->name('town.show');
    Route::get('/town/{town}/join', [TownController::class, 'join'])->name('town.join');
});

require __DIR__ . '/auth.php';
