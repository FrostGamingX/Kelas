<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\OrderDetailController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[FrontController::class,'index']);
Route::get('/show/{id}',[FrontController::class,'show']);
Route::get('register',[FrontController::class,'register']);

Route::get('login',[FrontController::class,'login']);
Route::get('logout',[FrontController::class,'logout']);

Route::post('postregister',[FrontController::class,'store']);
Route::post('postlogin',[FrontController::class,'postlogin']);
Route::get('cart', [CartController::class, 'cart']);
Route::get('hapus/{idmenu}', [CartController::class, 'hapus']);
Route::get('tambah/{idmenu}', [CartController::class, 'tambah']);
Route::get('kurang/{idmenu}', [CartController::class, 'kurang']);
Route::get('beli/{idmenu}', [CartController::class, 'beli']);
Route::get('batal', [CartController::class, 'batal']);
Route::get('checkout', [CartController::class, 'checkout']);
Route::get('admin', [AuthController::class, 'index']);
Route::post('admin/postlogin', [AuthController::class, 'postlogin']);
Route::get('admin/logout', [AuthController::class, 'logout']);

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){

    Route::group(['middleware' => ['CekLogin:admin']], function(){
        Route::resource('user', UsersController::class);
    });
    
    Route::group(['middleware' => ['CekLogin:kasir']], function(){
        Route::resource('order', OrdersController::class);
    });

    Route::group(['middleware' => ['CekLogin:manajer']], function(){
        Route::resource('kategori', KategoriController::class);
        Route::resource('menu', MenusController::class);
        Route::resource('order',OrdersController::class);
        Route::resource('orderdetail',OrderDetailController::class);
        Route::resource('pelanggan',PelangganController::class);
        Route::get('select',[ MenusController::class, 'select']);
        Route::post('postmenu/{idmenu}',[ MenusController::class, 'update']);
    });


});


