<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\HalamanAwal;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UploadController;
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



//ROUTE GENERAL
Route::get('login', [LoginController::class, "index"])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [LoginController::class, "register"]);
Route::post('signUp', [LoginController::class, "signUp"])->name('signUp');
Route::post('signIn', [LoginController::class, "signIn"])->name('signIn');

Route::middleware(['checkAuth', 'Revalidate'])->group(function () {
    Route::get('/', function () {
        return view('login.login');
    })->name('/');
    Route::resource('admin', AdminController::class);
    Route::resource('catalogue', CatalogueController::class);
    Route::resource('distributors', DistributorController::class);
    Route::resource('uploads', UploadController::class);
    Route::get('halamanAwal', [HalamanAwal::class, "index"])->name('halamanAwal');
});
