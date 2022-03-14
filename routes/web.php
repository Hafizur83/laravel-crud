<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\PostController;




Route::get('/', [PostController::class, 'index'])->name('home');
Route::resource('/catagory',CatagoryController::class);
Route::resource('/post',PostController::class);







// Auth::routes();
