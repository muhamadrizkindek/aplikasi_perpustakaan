<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamController;
use App\Models\Kategori;

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

//LOGIN

route::middleware('guest')->group(function(){

    
    Route::get('/register',[AuthController::class,'register'])->name('register');
    Route::post('/store/register',[AuthController::class,'storeRegister']);
    
    
    Route::get('/login',[AuthController::class,'login'])->name('login');
    Route::post('/store/login',[AuthController::class,'storeLogin']);
    
});




route::middleware('auth')->group(function(){
        
        Route::get('/', function () {
        return view('pages.dasboard.index');
    });
    
    
    Route::get('/databuku',  [BukuController::class,'index']);
    Route::get('/tambahbuku', [BukuController::class,'create']);
    Route::post('/store/buku', [BukuController::class,'store']);
    Route::get('/editbuku/{id}',   [BukuController::class,'editbuku']);
    Route::post('/updatebuku/{id}',   [BukuController::class,'update']);
    Route::get('/destroybuku/{id}',   [BukuController::class,'destroy']);
    
    Route::get('/kategoribuku', [KategoriController::class,'kategori']);
    Route::get('/tambahkategori', [KategoriController::class,'create']);
    Route::post('/store/kategori', [KategoriController::class,'store']);
    Route::get('/editkategori/{id}',   [KategoriController::class,'editkategori']);
    Route::post('/updatekategori/{id}',   [KategoriController::class,'update']);
    Route::get('/destroy/{id}',   [KategoriController::class,'destroy']);
    
    Route::get('/anggota', function () {
        return view('pages.anggota.user');
    });
    
    Route::get('/editpinjaman', function () {
    return view('pages.anggota.editpinjaman');
});

Route::get('/anggota', [UserController::class,'index']);


Route::get('/detailbuku', function () {
    return view('pages.buku.detailbuku');
});

Route::get('/profile', function () {
    return view('pages.admin.profile');
});


//ROUTE SISWA

Route::get('/user',[PeminjamController::class,'index']);
Route::get('/listpeminjam',[PeminjamController::class,'peminjamanku']);
Route::get('/peminjamanku',[PeminjamController::class,'create']);
Route::post('/store/peminjaman',[PeminjamController::class,'storePeminjam']);

Route::get('/logout',[AuthController::class,'logout']);



}) ;    