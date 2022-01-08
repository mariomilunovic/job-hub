<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
// use App\Http\Controllers\LoginController;
// use App\Http\Controllers\LogoutController;
// use App\Http\Controllers\RegisterController;
// use App\Http\Controllers\SkillController;

// use App\Http\Controllers\JobController;

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

require __DIR__. '/web/session.php';
require __DIR__. '/web/user.php';
require __DIR__. '/web/skill.php';
require __DIR__. '/web/job.php';
require __DIR__. '/web/bid.php';

//PAGE CONTROLLER
Route::get('/',[PageController::class,'home'])->name('page.home');
Route::get('dashboard',[PageController::class,'dashboard'])->name('page.dashboard')->middleware('check_roles:administrator,user');







