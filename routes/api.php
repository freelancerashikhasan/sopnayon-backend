<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CompanyInformationController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JWTAuthController;
use App\Http\Middleware\JwtMiddleware;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::get('company-information', [CompanyInformationController::class, 'index']);
Route::get('site-keyword', [CompanyInformationController::class, 'siteKeyword']);
Route::get('blogs', [CompanyInformationController::class, 'blogs']);
Route::get('gallary', [CompanyInformationController::class, 'gallary']);
Route::get('member', [CompanyInformationController::class, 'member']);

Route::middleware([JwtMiddleware::class])->group(function () {
    Route::get('user', [AuthController::class, 'getUser']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('/user/dashboard', [UserController::class, 'dashboard']);
    Route::post('/user/profile/edit', [UserController::class, 'profileEdit']);
    Route::get('/user/deposit', [UserController::class, 'deposit']);
    Route::get('/user/total-member', [UserController::class, 'totalMember']);
    Route::get('/user/donor-member', [UserController::class, 'donorMember']);
});
