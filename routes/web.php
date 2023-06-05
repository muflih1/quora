<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'welcome']);
Route::get('/browse', [PagesController::class, 'browse'])->name('browse');
Route::get('/search', [SearchController::class, 'index'])->name('search.index');

Route::middleware('guest')->controller(AuthController::class)->group(function() {
    Route::get('/register', 'register')->name('auth.register');
    Route::post('/register', 'registerStore')->name('auth.register_store');
    Route::get('/login', 'login')->name('auth.login');
    Route::post('/login', 'loginStore')->name('auth.login_store');
});

Route::middleware('auth')->group(function() {
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::resource('questions', QuestionController::class)->except(['index']);
    Route::resource('users', UserController::class);
    Route::get('/users/{user}/questions', [UserController::class, 'showAnsers'])
        ->name('users.show_answers');
    Route::controller(AnswerController::class)->group(function() {
        Route::get('/questions/{id}/answer', [AnswerController::class, 'create'])
            ->name('answers.create');
        Route::post('/asnwer/{id}', 'store')->name('answers.store');
        Route::get('/questions/{question}/users/{user}/answer/edit', 'edit')->name('answers.edit');
        Route::put('/ansers/{answer}', 'update')->name('answers.update');
        Route::delete('/answers/{answer}', 'destroy')->name('answers.destroy');
    });
    Route::post('/users/{user}/follow', [FollowController::class, 'store'])
        ->name('users.follow');
    Route::post('/question/{question}/follow', [FollowController::class, 'storeQuestion'])
        ->name('questions.follow');
});

// $array = [1,2,3,4,5,6,7,8,10,20,13,15,230];
