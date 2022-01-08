<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

//REGISTER CONTROLLER
Route::get('register',[RegisterController::class,'form'])->name('register.form')->middleware('guest');
Route::post('register',[RegisterController::class,'register'])->name('register.register');

//LOGIN CONTROLLER
Route::get('login',[LoginController::class,'form'])->name('login.form')->middleware('guest');
Route::post('login',[LoginController::class,'login'])->name('login.login')->middleware('guest');

//LOGOUT CONTROLLER
Route::get('logout',[LogoutController::class,'logout'])->name('logout.logout')->middleware('check_roles:administrator,user');