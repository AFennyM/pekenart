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
Route::get('/produk', function () {
    return "beli";
});
Route::post('checkout', function () {
    return redirect(route('success'));
});
Route::get('/sukses-page', function () {
    return "pembelian berhasil";
})->name('success');