<?php

use App\Api\Course\Controllers\ChapterController;
use App\Api\Course\Controllers\CourseController;
use App\Api\Topic\Controllers\TopicController;
use App\Api\User\Controllers\LoginController;
use App\Api\User\Controllers\RegisterController;
use App\Api\User\Controllers\UserController;
use App\Api\View\Controllers\ViewController;
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
        Route::get('/{id}', [CourseController::class, 'show']);
        Route::post('/{id}/enroll', [CourseController::class, 'enroll'])->middleware('auth:api');
    });

    Route::prefix('chapters')->group(function () {
        Route::get('/', [ChapterController::class, 'index']);
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
