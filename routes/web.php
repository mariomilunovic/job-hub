<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;

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
    return view('test');
});

//PAGE CONTROLLER
Route::get('/',[PageController::class,'showHome'])->name('showHome');
Route::get('dashboard',[PageController::class,'showDashboard'])->name('showDashboard')->middleware('check_roles:administrator,user');

//REGISTER CONTROLLER
Route::get('register',[RegisterController::class,'showRegisterForm'])->name('showRegisterForm')->middleware('guest');
Route::post('register',[RegisterController::class,'registerUser'])->name('registerUser');

//LOGIN CONTROLLER
Route::get('login',[LoginController::class,'showLoginForm'])->name('showLoginForm')->middleware('guest');
Route::post('login',[LoginController::class,'loginUser'])->name('loginUser')->middleware('guest');

//LOGOUT CONTROLLER
Route::get('logout',[LogoutController::class,'logout'])->name('logout')->middleware('check_roles:administrator,user');
// Route::get('logout',[LogoutController::class,'showLoginForm'])->name('redirect_login')->middleware('check_roles:administrator,manager,user');

//USER CONTROLLER
Route::get('users',[UserController::class,'index'])->name('users.index')->middleware('check_roles:administrator');
Route::get('users/profile',[UserController::class,'profile'])->name('users.profile')->middleware('check_roles:administrator');
// Route::get('users/grid',[UserController::class,'grid'])->name('users.grid')->middleware('check_roles:administrator');
// Route::get('users/search',[UserController::class,'search'])->name('users.search')->middleware('check_roles:administrator');
// Route::get('users/create',[UserController::class,'create'])->name('users.create')->middleware('check_roles:administrator');
Route::get('users/{user}',[UserController::class,'show'])->name('users.show')->middleware('check_roles:administrator,user');
// Route::post('users/store',[UserController::class,'store'])->name('users.store')->middleware('check_roles:administrator');
// Route::get('users/{user}/edit',[UserController::class,'edit'])->name('users.edit')->middleware('check_roles:administrator,manager,user');
// Route::post('users/{user}',[UserController::class,'store'])->name('users.store')->middleware('check_roles:administrator');
// Route::post('users/{user}',[UserController::class,'destroy'])->name('users.destroy')->middleware('check_roles:administrator');







