<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CheckoutController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/  Route::post('login', 'App\Http\Controllers\API\LoginController@authenticated')->name('authenticated');

    Route::get('kategori', 'App\Http\Controllers\API\CategoryController@index')->name('index');
    Route::get('tambah-kategori', 'App\Http\Controllers\API\CategoryController@add');
    Route::post('insert-kategori', 'App\Http\Controllers\API\CategoryController@insert');
    Route::get('edit-kategori/{id}', 'App\Http\Controllers\API\CategoryController@edit');
    Route::put('update-kategori/{id}', 'App\Http\Controllers\API\CategoryController@update');
    Route::get('delete-kategori/{id}', 'App\Http\Controllers\API\CategoryController@destroy');

    Route::get('produk', 'App\Http\Controllers\API\ProductController@index')->name('index');
    Route::get('tambah-produk', [ProdukController::class, 'add']);
    Route::post('insert-produk', 'App\Http\Controllers\API\ProductController@insert');
    Route::get('edit-produk/{id}', 'App\Http\Controllers\API\ProductController@edit');
    Route::put('update-produk/{id}', 'App\Http\Controllers\API\ProductController@update');
    Route::get('delete-produk/{id}', 'App\Http\Controllers\API\ProductController@destroy');

    Route::get('keranjang', 'App\Http\Controllers\API\CartController@tampilKeranjang');
    Route::get('checkout', 'App\Http\Controllers\API\CheckoutController@index');
    Route::get('cek-item', 'App\Http\Controllers\API\CheckoutController@getItemPesanan');
    Route::get('pesanan-saya', 'App\Http\Controllers\API\UserController@index');
    Route::get('cek-pesanan', 'App\Http\Controllers\API\UserController@view');

    Route::post('tambah-ke-keranjang', 'App\Http\Controllers\API\CartController@addProduk');
    Route::post('hapus-keranjang-item', 'App\Http\Controllers\API\CartController@hapusProduk');
    Route::post('update-keranjang', 'App\Http\Controllers\API\CartController@updateKeranjang');

    Route::get('kategori-produk', 'App\Http\Controllers\API\TampilanController@kategori');
    Route::get('kategori-produk/{slug}', 'App\Http\Controllers\API\TampilanController@lihatkategori');
    Route::get('kategori-produk/{kategori_slug}/{produk_slug}', 'App\Http\Controllers\API\TampilanController@lihatproduk');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
