<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\TarifController;
use Illuminate\Support\Facades\Route;

// auth
// login
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login-proses',[LoginController::class,'loginProses'])->name('login-proses');
// logout
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
// register
Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/register-proses',[LoginController::class,'registerProses'])->name('register-proses');

Route::group(['prefix' => 'admin' ,'middleware' => ['auth'],'as' => 'admin.'], function(){

     // Home dan User
     Route::get('/dashboard',[HomeController::class, 'dashboard'])->name('dashboard');
     Route::get('/user',[HomeController::class, 'user'])->name('user');
     
     // add user
     Route::get('/create',[HomeController::class, 'create'])->name('user.create');
     Route::post('/store',[HomeController::class, 'store'])->name('user.store');
     // edit
     Route::get('/edit/{id}',[HomeController::class, 'edit'])->name('user.edit');
     Route::put('/update/{id}',[HomeController::class, 'update'])->name('user.update');
     // delete
     Route::delete('/delete/{id}',[HomeController::class, 'delete'])->name('user.delete');


     // // data  tarif listrik
     Route::get('/tarif',[TarifController::class, 'tarif'])->name('tarif');
     // // add
     Route::get('/create-tarif',[TarifController::class, 'create'])->name('tarif.create');
     Route::post('/store-tarif',[TarifController::class, 'store'])->name('tarif.store');
     // // edit
     Route::get('/edit-tarif/{id}',[TarifController::class, 'edit'])->name('tarif.edit');
     Route::put('/update-tarif/{id}',[TarifController::class, 'update'])->name('tarif.update');
     // // delete
     Route::delete('/delete-tarif/{id}',[TarifController::class, 'delete'])->name('tarif.delete');


     // data pelanggan
     Route::get('/pelanggan',[PelangganController::class, 'pelanggan'])->name('pelanggan');
     // add
     Route::get('/create-pelanggan',[PelangganController::class, 'create'])->name('pelanggan.create');
     Route::post('/store-pelanggan',[PelangganController::class, 'store'])->name('pelanggan.store');
     // edit
     Route::get('/edit-pelanggan/{id}',[PelangganController::class, 'edit'])->name('pelanggan.edit');
     Route::put('/update-pelanggan/{id}',[PelangganController::class, 'update'])->name('pelanggan.update');
     // delete
     Route::delete('/delete-pelanggan/{id}',[PelangganController::class, 'delete'])->name('pelanggan.delete');


     // data tagihan
     Route::get('/tagihan',[TagihanController::class, 'tagihan'])->name('tagihan');
     Route::get('/rinci-tagihan/{id}',[TagihanController::class, 'rinci'])->name('tagihan.rinci');
     Route::delete('/delete-tagihan/{id}',[TagihanController::class, 'delete'])->name('tagihan.delete');


});




