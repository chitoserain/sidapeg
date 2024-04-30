<?php

use App\Http\Controllers\pegawaiController;
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

Route::resource('pegawai', pegawaiController::class);
Route::get('pegawai', [pegawaiController::class, 'index']);

Route::get('/', function () {
    return view('pages/home', [
        "title" => "Home"
    ]);
});

Route::get('/home', function () {
    return view('pages/home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('pages/about', [
        "title" => "About"
    ]);
});
