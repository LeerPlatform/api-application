<?php

use App\Course\Controllers\UnitController;
use App\Course\Controllers\CourseController;
use App\Topic\Controllers\TopicController;
use App\User\Controllers\LoginController;
use App\User\Controllers\LogoutController;
use App\Student\Controllers\RegisterController;
use App\User\Controllers\AuthenticatedUserController;
use App\User\Controllers\UserController;
use App\View\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::prefix('user')->group(function () {
            Route::post('login', [LoginController::class, 'login'])->middleware('guest:api');
            Route::post('logout', LogoutController::class, 'logout')->middleware('auth:api');
            Route::get('user', AuthenticatedUserController::class)->middleware('auth:api');
        });

        Route::prefix('student')->group(function () {
            Route::post('register', [RegisterController::class, 'register'])->middleware('guest:api');
        });
    });

    Route::prefix('courses')->group(function () {
        Route::get('/', [CourseController::class, 'index']);
        Route::post('/', [CourseController::class, 'store']);
        Route::get('/{id}', [CourseController::class, 'show']);
        Route::put('/{course}', [CourseController::class, 'update']);
        Route::delete('/{course}', [CourseController::class, 'destroy']);
        Route::post('/{course}/enroll', [CourseController::class, 'enroll'])->middleware('auth:api');
    });

    Route::prefix('unitss')->group(function () {
        Route::get('/', [UnitController::class, 'index']);
        Route::post('/', [UnitController::class, 'store']);
        Route::get('/{unit}', [UnitController::class, 'show']);
        Route::put('/{unit}', [UnitController::class, 'update']);
        Route::delete('/{unit}', [UnitController::class, 'destroy']);
    });

    Route::prefix('topics')->group(function () {
        Route::get('/', [TopicController::class, 'index']);
        Route::post('/', [TopicController::class, 'store']);
        Route::get('/{topic}', [TopicController::class, 'show']);
        Route::put('/{topic}', [TopicController::class, 'update']);
        Route::delete('/{topic}', [TopicController::class, 'destroy']);
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/{user}', [UserController::class, 'show']);
        Route::put('/{id}', [UserController::class, 'update']);
        Route::delete('/{user}', [UserController::class, 'destroy']);
    });

    Route::prefix('views')->group(function () {
        Route::post('/record-topic-view/{id}', [ViewController::class, 'recordTopicView']);
        Route::post('/record-course-view/{id}', [ViewController::class, 'recordCourseView']);
    });
});
