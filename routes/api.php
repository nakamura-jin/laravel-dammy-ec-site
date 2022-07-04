<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;

Route::get('users', [UserController::class, 'index']);
Route::post('user', [UserController::class, 'store']);
Route::get('user/{id}', [UserController::class, 'show']);
Route::put('user/{id}', [UserController::class, 'edit']);
Route::delete('user/{id}', [UserController::class, 'destroy']);


Route::get('menus', [MenuController::class, 'index']);
Route::post('menu', [MenuController::class, 'store']);
Route::get('menu/{id}', [MenuController::class, 'show']);
Route::put('menu/{id}', [MenuController::class, 'edit']);
Route::get('menu/{id}', [MenuController::class, 'destroy']);
