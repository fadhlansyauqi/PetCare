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

// ini buat route public, bisa diakses siapapun tanpa login sekalipun
Route::group([], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/layanan', function () {
        return view('layanan');
    })->name('layanan');

    Route::get('/petshop', function () {
        return view('petshop');
    })->name('petshop');

    Route::get('/dokter', function () {
        return view('dokter');
    })->name('dokter');
    
    Route::get('/tentang-kami', function () {
        return view('tentang-kami');
    })->name('tentang-kami');
});


Auth::routes();

// ini buat khusus admin
Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.admin-dashboard');
    });

    // Anda bisa menambahkan route lain yang hanya bisa diakses oleh admin di sini
});


//ini buat khusus client
Route::middleware(['role:client'])->group(function () {

    // Anda bisa menambahkan route lain yang hanya bisa diakses oleh client di sini
});

