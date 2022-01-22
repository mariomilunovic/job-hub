<?php

use App\Http\Controllers\SkillController;

//CUSTOM ROUTES =====>
Route::get('/skill/{user}/user',[SkillController::class,'user'])->name('skill.user')->middleware('check_roles:administrator,user');
Route::get('/skill/jobs',[SkillController::class,'jobs'])->name('skill.jobs')->middleware('check_roles:administrator,user');


//RESOURCE ROUTES =====> Route::resource('skill', SkillController::class);
Route::get('/skill',[SkillController::class,'index'])->name('skill.index');
Route::post('/skill',[SkillController::class,'store'])->name('skill.store')->middleware('check_roles:administrator,user');
Route::get('/skill/create',[SkillController::class,'create'])->name('skill.create')->middleware('check_roles:administrator,user');
Route::get('/skill/{skill}',[SkillController::class,'show'])->name('skill.show')->middleware('check_roles:administrator,user');
Route::put('/skill/{skill}',[SkillController::class,'update'])->name('skill.update')->middleware('check_roles:administrator,user');
Route::delete('skill/{skill}',[SkillController::class,'destroy'])->name('skill.destroy')->middleware('check_roles:administrator,user');
Route::get('skill/{skill}/edit',[SkillController::class,'edit'])->name('skill.edit')->middleware('check_roles:administrator,user');
