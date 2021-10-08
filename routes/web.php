<?php

use App\Http\Controllers\GeneralController;
use App\Http\Controllers\JobsController;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return redirect()->route('home',['recruiter'=>'scoople']);
});

Route::group(['prefix' => '{recruiter}'], function () {

    Route::get('/', [GeneralController::class,'home'])->name('home');

    Route::get('job', [JobsController::class,'job'])->name('job');
    Route::get('jobs', [JobsController::class,'jobs'])->name('jobs');
    Route::get('getAllJobs',[JobsController::class,'getAllJobs'])->name('getAllJobs');
    Route::post('apply_job',[GeneralController::class,'apply_job'])->name('apply_job');

});

Route::post('send_contact_us',[GeneralController::class,'send_contact_us'])->name('send_contact_us');
