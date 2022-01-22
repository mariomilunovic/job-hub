
<?php

use App\Http\Controllers\DepositController;

//CUSTOM ROUTES =====>

//RESOURCE ROUTES =====> Route::resource('deposit', depositController::class);
Route::get('/deposit',[DepositController::class,'index'])->name('deposit.index')->middleware('check_roles:administrator');
Route::post('/deposit',[DepositController::class,'store'])->name('deposit.store')->middleware('check_roles:administrator,user');
Route::get('/deposit/create',[DepositController::class,'create'])->name('deposit.create')->middleware('check_roles:administrator,user');
Route::get('/deposit/{deposit}',[DepositController::class,'show'])->name('deposit.show')->middleware('check_roles:administrator,user');
Route::put('/deposit/{deposit}',[DepositController::class,'update'])->name('deposit.update')->middleware('check_roles:administrator');
Route::get('deposit/{deposit}/destroy',[DepositController::class,'destroy'])->name('deposit.destroy')->middleware('check_roles:administrator');
Route::get('deposit/{deposit}/edit',[DepositController::class,'edit'])->name('deposit.edit')->middleware('check_roles:administrator');
