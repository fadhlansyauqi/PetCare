<?php

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

Auth::routes();

Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.index');
    });

    // Anda bisa menambahkan route lain yang hanya bisa diakses oleh admin di sini
});


Route::get('/home', function () {
    // User-only page
})->middleware('role:client');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
