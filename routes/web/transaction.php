<?php

use App\Http\Controllers\TransactionController;

//CUSTOM ROUTES =====>
Route::get('transaction/index',[TransactionController::class,'index'])->name('transaction.index')->middleware('check_roles:administrator,user');
Route::get('transaction/{transaction}',[TransactionController::class,'show'])->name('transaction.show')->middleware('check_roles:administrator,user');
Route::get('transaction/{user}/index',[TransactionController::class,'user'])->name('transaction.user')->middleware('check_roles:administrator,user');
Route::get('transaction/create',[TransactionController::class,'create'])->name('transaction.create')->middleware('check_roles:administrator,user');
Route::post('transaction/store',[TransactionController::class,'store'])->name('transaction.store')->middleware('check_roles:administrator,user');
