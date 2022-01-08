<?php

use App\Http\Controllers\UserController;

//CUSTOM ROUTES =====>
Route::get('user/search',[UserController::class,'search'])->name('user.search')->middleware('check_roles:administrator');

//RESOURCE ROUTES =====> Route::resource('user', UserController::class);
Route::get('/user',[UserController::class,'index'])->name('user.index')->middleware('check_roles:administrator');
Route::post('/user',[UserController::class,'store'])->name('user.store')->middleware('check_roles:administrator');
Route::get('/user/create',[UserController::class,'create'])->name('user.create')->middleware('check_roles:administrator');
Route::get('/user/{user}',[UserController::class,'show'])->name('user.show')->middleware('check_roles:administrator,user');
Route::put('/user/{user}',[UserController::class,'update'])->name('user.update')->middleware('check_roles:administrator');
Route::delete('user/{user}',[UserController::class,'destroy'])->name('user.destroy')->middleware('check_roles:administrator');
Route::get('user/{user}/edit',[UserController::class,'edit'])->name('user.edit')->middleware('check_roles:administrator');





// Route::middleware('check_roles:administrator
// ')
// ->name('user.')
// ->group(function()

// {

// //CUSTOM ROUTES =====>
// Route::get('user/search',[UserController::class,'search'])->name('search');

// //RESOURCE ROUTES =====> Route::resource('user', UserController::class);
// Route::get('/user',[UserController::class,'index'])->name('index')->withoutMiddleware(['check_roles']);
// Route::post('/user',[UserController::class,'store'])->name('store');
// Route::get('/user/create',[UserController::class,'create'])->name('create');
// Route::get('/user/{user}',[UserController::class,'show'])->name('show');
// Route::put('/user/{user}',[UserController::class,'update'])->name('update');
// Route::delete('user/{user}',[UserController::class,'destroy'])->name('destroy');
// Route::get('user/{user}/edit',[UserController::class,'edit'])->name('edit');


// }

// );
