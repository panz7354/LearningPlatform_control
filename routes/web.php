<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PracticeController;

// ===== 首頁 =====
Route::get('/', function () {
    return view('home');
});

// ===== 登入 / 登出 =====
Route::get('/login',   [LoginController::class, 'showLogin']);
Route::post('/login',  [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

// ===== 註冊 =====
Route::get('/register',  [RegisterController::class, 'showRegister']);
Route::post('/register', [RegisterController::class, 'register']);

// ===== 課程頁面 =====
Route::get('/lesson0', function () { return view('lesson/lesson0'); });
Route::get('/lesson1', function () { return view('lesson/lesson1'); });
Route::get('/lesson2', function () { return view('lesson/lesson2'); });
Route::get('/lesson3', function () { return view('lesson/lesson3'); });
Route::get('/lesson4', function () { return view('lesson/lesson4'); });
Route::get('/lesson5', function () { return view('lesson/lesson5'); });

// ===== 程式實作 =====
Route::get('/practice',         [PracticeController::class, 'index']);
Route::get('/practice/{unit}',  [PracticeController::class, 'show']);
Route::post('/practice/{unit}', [PracticeController::class, 'judge']);

// ===== 互動測驗 =====
Route::get('/quiz',              [QuizController::class, 'index']);
Route::get('/quiz/{unit}',       [QuizController::class, 'show']);
Route::post('/quiz/{unit}/result', [QuizController::class, 'saveResult']);
Route::post('/quiz/{unit}/effort', [QuizController::class, 'saveEffort']);

// ===== layout 預覽（開發用） =====
Route::get('/app', function () {
    return view('layouts/app');
});
