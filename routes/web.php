<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PetStore\PetController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/check-user', [\App\Http\Controllers\UserController::class,'showCheckUserForm'])->name('check-user');
Route::post('/check-user', [\App\Http\Controllers\UserController::class,'checkUser']);

require __DIR__.'/auth.php';
Route::post('/clear-session', [AuthenticatedSessionController::class, 'clearSession']);
Route::post('/petstore/create', [PetController::class, 'createPet']);
Route::get('/petstore/showPet', [PetController::class, 'showPet'])->name('petstore.showPet');
Route::delete('/petstore/delete', [PetController::class, 'deletePet'])->name('petstore.deletePet');
Route::put('/petstore/updatePet', [PetController::class, 'updatePet'])->name('petstore.updatePet');
Route::post('/petstore/updatePet2', [PetController::class, 'updatePet2'])->name('petstore.updatePet2');
