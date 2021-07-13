<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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


//PAGE CONTROLLER
//Route::group(
//    [
//        'middleware'=>['check_roles'],
//        'roles' => ['administrator','manager','user']
//    ],
//    function()
//    {
//        Route::get('/',[PageController::class,'showHome'])->name('show_home');
//        Route::get('dashboard',[PageController::class,'showDashboard'])->name('show_dashboard');
//
//    } );


//PAGE CONTROLLER
Route::get('/',[PageController::class,'showHome'])->name('show_home');
Route::get('dashboard',[PageController::class,'showDashboard'])->name('show_dashboard')->middleware('check_roles:administrator,manager,user');

//REGISTER CONTROLLER
Route::get('register',[RegisterController::class,'showRegisterForm'])->name('register')->middleware('guest');
Route::post('register',[RegisterController::class,'register'])->name('register');

//LOGIN CONTROLLER
Route::get('login',[LoginController::class,'showLoginForm'])->name('show_login')->middleware('guest');
Route::post('login',[LoginController::class,'login'])->name('login')->middleware('guest');

//LOGOUT CONTROLLER
Route::post('logout',[LogoutController::class,'logout'])->name('logout')->middleware('check_roles:administrator,manager,user');
Route::get('logout',[LogoutController::class,'showLoginForm'])->name('redirect_login')->middleware('check_roles:administrator,manager,user');

//USER CONTROLLER
Route::get('profile',[UserController::class,'profile'])->name('users.show')->middleware('check_roles:administrator');
Route::get('users/{id}',[UserController::class,'show'])->name('users.show')->middleware('check_roles:administrator,manager,user');
Route::get('users',[UserController::class,'index'])->name('users.index')->middleware('check_roles:administrator');




