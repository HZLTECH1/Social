<?php

use App\Http\Controllers\MessagesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'index'])->name('index');
Route::post('/users', [UserController::class, 'create_user'])->name('create_user');
Route::post('/users/login', [UserController::class, 'login_user'])->name('login_user');
Route::post('/users/logout', [UserController::class, 'logout_user'])->name('logout_user');
Route::get('/test', [UserController::class, 'test'])->name('test');
Route::get('/', [MessagesController::class, 'index'])->name('messages_index');
Route::post('/', [MessagesController::class, 'create_message'])->name('create_message');
Route::get('/messages/:id', [MessagesController::class, 'show_user_messages'])->name('show_user_messages');
