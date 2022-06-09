<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Frontend\TampilanController;
use App\Http\Controllers\Frontend\KeranjangController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TampilanController::class, 'index']);
Route::get('kategori-produk', [TampilanController::class, 'kategori']);
Route::get('kategori-produk/{slug}', [TampilanController::class, 'lihatkategori']);
Route::get('kategori-produk/{kategori_slug}/{produk_slug}', [TampilanController::class, 'lihatproduk']);

// Route::get('tampil-produk/{slug}', [TampilanController::class, 'viewproduk']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['middleware' => ['auth', 'isAdmin']], function() {
//     Route::get('/dashboard', function() {
//         return view('admin.dashboard');
//     });
// });
Route::post('tambah-ke-keranjang', [KeranjangController::class, 'addProduk']);
Route::post('hapus-keranjang-item', [KeranjangController::class, 'hapusProduk']);
Route::post('update-keranjang', [KeranjangController::class, 'updateKeranjang']);

Route::middleware(['auth'])->group(function () {
    // Route::post('tambah-ke-keranjang', [KeranjangController::class, 'addProduk']);
    Route::get('keranjang', [KeranjangController::class, 'tampilKeranjang']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('setujui-pesanan', [CheckoutController::class, 'setujuipesanan']);
    Route::get('pesanan-saya', [UserController::class, 'index']);
    Route::get('cek-pesanan', [UserController::class, 'view']);
});

Route::middleware(['auth', 'isAdmin'])->group(function() {
    // Route::get('/dashboard', function() {
    //     return view('admin.index');
    // });
    Route::get('/dashboard', 'App\Http\Controllers\Admin\FrontendController@index')->name('index');
    
    Route::get('kategori', 'App\Http\Controllers\Admin\KategoriController@index')->name('index');
    Route::get('tambah-kategori', 'App\Http\Controllers\Admin\KategoriController@add');
    Route::post('insert-kategori', 'App\Http\Controllers\Admin\KategoriController@insert');
    Route::get('edit-kategori/{id}', [KategoriController::class, 'edit']);
    Route::put('update-kategori/{id}', [KategoriController::class, 'update']);
    Route::get('delete-kategori/{id}', [KategoriController::class, 'destroy']);

    Route::get('produk', [ProdukController::class, 'index']);
    Route::get('tambah-produk', [ProdukController::class, 'add']);
    Route::post('insert-produk', 'App\Http\Controllers\Admin\ProdukController@insert');
    Route::get('edit-produk/{id}', [ProdukController::class, 'edit']);
    Route::put('update-produk/{id}', [ProdukController::class, 'update']);
    Route::get('delete-produk/{id}', [ProdukController::class, 'destroy']);
});