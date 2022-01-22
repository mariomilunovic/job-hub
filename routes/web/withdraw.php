<?php

use App\Http\Controllers\WithdrawController;



//CUSTOM ROUTES =====>

//RESOURCE ROUTES =====> Route::resource('withdraw', withdrawController::class);
Route::get('/withdraw',[WithdrawController::class,'index'])->name('withdraw.index')->middleware('check_roles:administrator');
Route::post('/withdraw',[WithdrawController::class,'store'])->name('withdraw.store')->middleware('check_roles:administrator,user');
Route::get('/withdraw/create',[WithdrawController::class,'create'])->name('withdraw.create')->middleware('check_roles:administrator,user');
Route::get('/withdraw/{withdraw}',[WithdrawController::class,'show'])->name('withdraw.show')->middleware('check_roles:administrator,user');
Route::put('/withdraw/{withdraw}',[WithdrawController::class,'update'])->name('withdraw.update')->middleware('check_roles:administrator');
Route::get('withdraw/{withdraw}/destroy',[WithdrawController::class,'destroy'])->name('withdraw.destroy')->middleware('check_roles:administrator');
Route::get('withdraw/{withdraw}/edit',[WithdrawController::class,'edit'])->name('withdraw.edit')->middleware('check_roles:administrator');
