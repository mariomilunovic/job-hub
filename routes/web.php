<?php

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

require __DIR__. '/web/session.php';
require __DIR__. '/web/user.php';
require __DIR__. '/web/skill.php';
require __DIR__. '/web/job.php';
require __DIR__. '/web/bid.php';
require __DIR__. '/web/deposit.php';
require __DIR__. '/web/withdraw.php';
require __DIR__. '/web/transaction.php';
