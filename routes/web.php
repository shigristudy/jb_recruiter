<?php

use App\Http\Controllers\GeneralController;
use App\Http\Controllers\JobsController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return redirect()->route('home',['recruiter'=>'scoople']);
});

Route::group(['prefix' => '{recruiter}'], function () {

    Route::get('/', [GeneralController::class,'home'])->name('home')->middleware('verify_website');

    Route::get('job', [JobsController::class,'job'])->name('job')->middleware('verify_website');
    Route::get('jobs', [JobsController::class,'jobs'])->name('jobs')->middleware('verify_website');
    Route::get('getAllJobs',[JobsController::class,'getAllJobs'])->name('getAllJobs');
    Route::post('apply_job',[GeneralController::class,'apply_job'])->name('apply_job');

    Route::get('privacy',[GeneralController::class,'privacy'])->name('privacy');

    Route::post('send_contact_us',[GeneralController::class,'send_contact_us'])->name('send_contact_us');
});


Route::get('/artisan/cache-clear', function () {
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return $exitCode;
});
