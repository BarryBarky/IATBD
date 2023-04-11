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
    return redirect('/dashboard');
});

Route::get('/inloggen', function () {
    return view('users.login');
})->name('login');

Route::get('/registreren', function () {
    return view('users.register');
});

Route::get('/uitloggen', [\App\Http\Controllers\UserController::class, 'logout']);

Route::post('/gebruikers', [\App\Http\Controllers\UserController::class, 'store']);

Route::post('/gebruikers/authenticeren', [\App\Http\Controllers\UserController::class, 'authenticate']);

//dashboard
Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware('auth');

Route::get('/dashboard/advertenties', [\App\Http\Controllers\AdvertisementController::class, 'index'])->middleware('auth');

Route::post('/dashboard/advertenties', [\App\Http\Controllers\AdvertisementController::class, 'store'])->middleware('auth');

Route::get('/dashboard/advertenties/aanmaken', [\App\Http\Controllers\AdvertisementController::class, 'create'])->middleware('auth');

Route::get('/dashboard/advertenties/{advertisement}', [\App\Http\Controllers\AdvertisementController::class, 'show'])->middleware('auth');

Route::put('/dashboard/advertenties/{advertisement}', [\App\Http\Controllers\AdvertisementController::class, 'update'])->middleware('auth');

Route::delete('/dashboard/advertenties/{advertisement}', [\App\Http\Controllers\AdvertisementController::class, 'destroy'])->middleware('auth');

Route::get('/dashboard/advertenties/{advertisement}/bewerken', [\App\Http\Controllers\AdvertisementController::class, 'edit'])->middleware('auth');

Route::post('/dashboard/advertenties/{advertisement}/aanvraag-doen', [\App\Http\Controllers\AdvertisementController::class, 'request'])->middleware('auth');

Route::put('/dashboard/advertenties/{advertisement}/accepteren', [\App\Http\Controllers\AdvertisementController::class, 'acceptRequest'])->middleware('auth');

Route::get('/dashboard/huisdieren', [\App\Http\Controllers\PetController::class, 'index'])->middleware('auth');

Route::get('/dashboard/huisdieren/aanmaken', [\App\Http\Controllers\PetController::class, 'create'])->middleware('auth');

Route::post('/dashboard/huisdieren', [\App\Http\Controllers\PetController::class, 'store'])->middleware('auth');

Route::get('/dashboard/huisdieren/{pet}', [\App\Http\Controllers\PetController::class, 'show'])->middleware('auth');

Route::put('/dashboard/huisdieren/{pet}', [\App\Http\Controllers\PetController::class, 'update'])->middleware('auth');

Route::delete('/dashboard/huisdieren/{pet}', [\App\Http\Controllers\PetController::class, 'destroy'])->middleware('auth');

Route::get('/dashboard/huisdieren/{pet}/bewerken', [\App\Http\Controllers\PetController::class, 'edit'])->middleware('auth');

Route::get('/dashboard/mijn-profiel', [\App\Http\Controllers\UserController::class, 'show'])->middleware('auth');

Route::get('/dashboard/mijn-profiel/bewerken', [\App\Http\Controllers\UserController::class, 'edit'])->middleware('auth');

Route::put('/dashboard/mijn-profiel/{user}', [\App\Http\Controllers\UserController::class, 'update'])->middleware('auth');

Route::get('/dashboard/mijn-profiel/oppasser/aanmaken', [\App\Http\Controllers\PetSitterController::class, 'create'])->middleware('auth');

Route::post('/dashboard/mijn-profiel/oppasser', [\App\Http\Controllers\PetSitterController::class, 'store'])->middleware('auth');

Route::get('/dashboard/mijn-profiel/oppasser/bewerken', [\App\Http\Controllers\PetSitterController::class, 'edit'])->middleware('auth');

Route::put('/dashboard/mijn-profiel/oppasser/{petSitter}', [\App\Http\Controllers\PetSitterController::class, 'update'])->middleware('auth');

Route::delete('/dashboard/mijn-profiel/oppasser/{petSitter}', [\App\Http\Controllers\PetSitterController::class, 'destroy'])->middleware('auth');

Route::get('/dashboard/advertenties/{advertisement}/profiel/{user}', [\App\Http\Controllers\UserController::class, 'showRequestedUser'])->middleware('auth');

Route::get('/dashboard/gebruikers/{user}', [\App\Http\Controllers\UserController::class, 'showOthers'])->middleware('auth');

Route::put('/dashboard/gebruikers/block', [\App\Http\Controllers\UserController::class, 'block'])->middleware('auth');

Route::delete('/dashboard/oppasser/{petSitter}/aanvraag', [\App\Http\Controllers\PetSitterController::class, 'removeRequest'])->middleware('auth');

Route::post('/dashboard/profiel/{user}/review', [\App\Http\Controllers\ReviewController::class, 'store'])->middleware('auth');

Route::delete('/dashboard/profiel/{user}/review/{review}', [\App\Http\Controllers\ReviewController::class, 'destroy'])->middleware('auth');

Route::get('/dashboard/beheer', [\App\Http\Controllers\UserController::class, 'manage'])->middleware('auth');
