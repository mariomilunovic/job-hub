<?php

use App\Http\Controllers\JobController;

//CUSTOM ROUTES =====>
Route::get('job/{user}/user',[JobController::class,'user'])->name('job.user')->middleware('check_roles:administrator,user');
Route::get('job/{job}/bids',[JobController::class,'bids'])->name('job.bids')->middleware('check_roles:administrator,user');
Route::get('job/skill/{skill}',[JobController::class,'skill'])->name('job.skill')->middleware('check_roles:administrator,user');

//RESOURCE ROUTES =====> Route::resource('job', JobController::class);
Route::get('/job',[JobController::class,'index'])->name('job.index');
Route::post('/job',[JobController::class,'store'])->name('job.store')->middleware('check_roles:administrator,user');
Route::get('/job/create',[JobController::class,'create'])->name('job.create')->middleware('check_roles:administrator,user');
Route::get('/job/{job}',[JobController::class,'show'])->name('job.show')->middleware('check_roles:administrator,user');
Route::put('/job/{job}',[JobController::class,'update'])->name('job.update')->middleware('check_roles:administrator,user');
Route::get('job/{job}/destroy',[JobController::class,'destroy'])->name('job.destroy')->middleware('check_roles:administrator,user'); //edited
Route::get('job/{job}/edit',[JobController::class,'edit'])->name('job.edit')->middleware('check_roles:administrator,user');
