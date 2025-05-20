<?php

use App\Http\Controllers\GeneralController;
use App\Http\Controllers\GlobalSearchController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\LmsController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return redirect()->route('home',['recruiter'=>'scoople']);
});

Route::group(['prefix' => '{recruiter}'], function () {

    Route::get('/', [GeneralController::class,'home'])->name('home')->middleware('verify_website');

    Route::get('job', [JobsController::class,'job'])->name('job')->middleware('verify_website');
    Route::get('course', [JobsController::class,'course'])->name('course')->middleware('verify_website');
    Route::get('courses', [JobsController::class,'courses'])->name('courses')->middleware('verify_website');
    Route::get('jobs', [JobsController::class,'jobs'])->name('jobs')->middleware('verify_website');
    Route::get('getAllJobs',[JobsController::class,'getAllJobs'])->name('getAllJobs');
    Route::post('apply_job',[GeneralController::class,'apply_job'])->name('apply_job');
    Route::get('global-search', [GlobalSearchController::class,'search'])->name('global-search')->middleware('verify_website');
    
    Route::group(['prefix' => 'lms'], function () {
        Route::get('courses', [LmsController::class,'index'])->name('lms.courses')->middleware('verify_website');
        Route::get('course/{id}', [LmsController::class,'show'])->name('lms.courses_details')->middleware('verify_website');
        
        Route::get('communities', [LmsController::class,'indexCommunities'])->name('lms.communities')->middleware('verify_website');
        Route::get('community/{id}', [LmsController::class,'showCommunity'])->name('lms.community_details')->middleware('verify_website');

        // Digital books
        Route::get('/digital-books',[LmsController::class, 'indexDigitalBook'])->name('lms.digital.books')->middleware('verify_website');
        Route::get('/digital-book/{id}',[LmsController::class, 'showDigitalBook'])->name('lms.digital.books.details')->middleware('verify_website');

        // Coaches
        Route::get('/coaches',[LmsController::class, 'indexCoach'])->name('lms.coach')->middleware('verify_website');
        Route::get('/coach/{id}',[LmsController::class, 'showCoach'])->name('lms.coach.details')->middleware('verify_website');

        // Coaches
        Route::get('/products',[LmsController::class, 'indexProduct'])->name('lms.product')->middleware('verify_website');
        Route::get('/product/{id}',[LmsController::class, 'showProduct'])->name('lms.product.details')->middleware('verify_website');
    });
    Route::get('get-all-courses',[JobsController::class,'getAllCourses'])->name('getAllCourses');
    Route::get('privacy',[GeneralController::class,'privacy'])->name('privacy');

    Route::post('send_contact_us',[GeneralController::class,'send_contact_us'])->name('send_contact_us');
});

// LMS Public Routes
Route::get('lms/courses', [JobsController::class,'course_details'])->name('course_details')->middleware('verify_website');


Route::get('/artisan/cache-clear', function () {
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return $exitCode;
});
