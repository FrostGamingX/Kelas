<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProdukController;

Route::get('/',[PageController::class,'home']);
Route::get('menu',[ProdukController::class,'menu']);
Route::get('/visi-misi', function () {
    return view('visi-misi');
});
Route::get('/chat', function () {
    return view('chat');
});
Route::get('/order', function () {
    return view('order');
});

Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');




