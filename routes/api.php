<?php

use App\Course\Controllers\ChapterController;
use App\Course\Controllers\CourseController;
use App\Topic\Controllers\TopicController;
use App\User\Controllers\LoginController;
use App\User\Controllers\RegisterController;
use App\User\Controllers\UserController;
use App\View\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('login', [LoginController::class, 'login']);
        Route::post('logout', [LoginController::class, 'logout'])->middleware('auth:api');
        Route::post('register', [RegisterController::class, 'register']);
        Route::get('user', [UserController::class, 'authenticated'])->middleware('auth:api');
    });

    Route::prefix('courses')->group(function () {
        Route::get('/', [CourseController::class, 'index']);
        Route::post('/', [CourseController::class, 'store']);
        Route::get('/{id}', [CourseController::class, 'show']);
        Route::put('/{course}', [CourseController::class, 'update']);
        Route::delete('/{course}', [CourseController::class, 'destroy']);
        Route::post('/{course}/enroll', [CourseController::class, 'enroll'])->middleware('auth:api');
    });

    Route::prefix('chapters')->group(function () {
        Route::get('/', [ChapterController::class, 'index']);
        Route::post('/', [ChapterController::class, 'store']);
        Route::put('/{chapter}', [ChapterController::class, 'update']);
        Route::get('/{id}', [ChapterController::class, 'show']);
    });

    Route::prefix('topics')->group(function () {
        Route::get('/', [TopicController::class, 'index']);
    });

    Route::prefix('users')->group(function () {
        Route::put('/{id}', [UserController::class, 'update']);
    });

    Route::prefix('views')->group(function () {
        Route::post('/record-topic-view/{id}', [ViewController::class, 'recordTopicView']);
        Route::post('/record-course-view/{id}', [ViewController::class, 'recordCourseView']);
    });
});
