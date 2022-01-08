<?php

use App\Http\Controllers\JobController;

//CUSTOM ROUTES =====>
Route::get('job/{user}/user',[JobController::class,'user'])->name('job.user')->middleware('check_roles:administrator');
Route::get('job/{bid}/bids',[JobController::class,'user'])->name('job.bids')->middleware('check_roles:administrator');

//RESOURCE ROUTES =====> Route::resource('job', JobController::class);
Route::get('/job',[JobController::class,'index'])->name('job.index')->middleware('check_roles:administrator,user');
Route::post('/job',[JobController::class,'store'])->name('job.store')->middleware('check_roles:administrator,user');
Route::get('/job/create',[JobController::class,'create'])->name('job.create')->middleware('check_roles:administrator,user');
Route::get('/job/{job}',[JobController::class,'show'])->name('job.show')->middleware('check_roles:administrator');
Route::put('/job/{job}',[JobController::class,'update'])->name('job.update')->middleware('check_roles:administrator');
Route::delete('job/{job}',[JobController::class,'destroy'])->name('job.destroy')->middleware('check_roles:administrator');
Route::get('job/{job}/edit',[JobController::class,'edit'])->name('job.edit')->middleware('check_roles:administrator');
