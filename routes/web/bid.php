<?php

use App\Http\Controllers\BidController;

//CUSTOM ROUTES =====>
Route::get('bid/{user}/user',[BidController::class,'user'])->name('bid.user')->middleware('check_roles:administrator');


//RESOURCE ROUTES =====> Route::resource('bid', bidController::class);
Route::get('/bid',[BidController::class,'index'])->name('bid.index')->middleware('check_roles:administrator');
Route::post('/bid',[BidController::class,'store'])->name('bid.store')->middleware('check_roles:administrator');
Route::get('/bid/{job}/create',[BidController::class,'create'])->name('bid.create')->middleware('check_roles:administrator');
Route::get('/bid/{bid}',[BidController::class,'show'])->name('bid.show')->middleware('check_roles:administrator,user');
Route::put('/bid/{bid}',[BidController::class,'update'])->name('bid.update')->middleware('check_roles:administrator');
Route::delete('bid/{bid}',[BidController::class,'destroy'])->name('bid.destroy')->middleware('check_roles:administrator');
Route::get('bid/{bid}/edit',[BidController::class,'edit'])->name('bid.edit')->middleware('check_roles:administrator');
