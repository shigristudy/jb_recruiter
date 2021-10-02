<?php

use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return redirect()->route('home',['recruiter'=>'jobbank']);
});

Route::group(['prefix' => '{recruiter}'], function () {

    Route::get('/', [GeneralController::class,'home'])->name('home');
    Route::get('job', [GeneralController::class,'job'])->name('job');
    Route::get('jobs', [GeneralController::class,'jobs'])->name('jobs');
});
