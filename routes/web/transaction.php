<?php

use App\Http\Controllers\TransactionController;

//CUSTOM ROUTES =====>
Route::get('transaction/index',[TransactionController::class,'index'])->name('transaction.index')->middleware('check_roles:administrator,user');
Route::get('transaction/{user}/index',[TransactionController::class,'user'])->name('transaction.user')->middleware('check_roles:administrator,user');
Route::get('transaction/deposit',[TransactionController::class,'deposit'])->name('transaction.deposit')->middleware('check_roles:administrator,user');
Route::get('transaction/withdraw',[TransactionController::class,'withdraw'])->name('transaction.withdraw')->middleware('check_roles:administrator,user');
Route::post('transaction/store',[TransactionController::class,'store'])->name('transaction.store')->middleware('check_roles:administrator,user');
