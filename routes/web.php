<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class,'index']);
Route::get('/home', [BlogController::class,'index']);

Route::get('/blogs/{blog:slug}', [BlogController::class , 'show']);

Route::get('/register', [AuthController::class,'create'])->middleware('guest');
Route::post('/register', [AuthController::class,'store'])->middleware('guest');

Route::get('/login', [AuthController::class,'login'])->middleware('guest');

Route::post('/login', [AuthController::class,'postLogin']);

Route::get('/logout', [AuthController::class,'logout'])->middleware('auth');

Route::post('/blogs/{blog:slug}/subscription', [BlogController::class,'subscriptionHandler']);


Route::resource('user', UserController::class);

Route::post('/blogs/{blog:slug}/comments', [CommentController::class,'store']);

Route::middleware('admin')->group(function () {

    Route::get('/admin/blogs/dashboard', [AdminBlogController::class,'index']);
    Route::get('/admin/blogs/create', [AdminBlogController::class,'create']);
    Route::post('/admin/blogs/store', [AdminBlogController::class,'store']);
    Route::get('/admin/blogs/{blog}/edit', [AdminBlogController::class,'edit']);
    Route::put('/admin/blogs/{blog}/update', [AdminBlogController::class,'update']);
    Route::delete('/admin/blogs/{blog}/destroy', [AdminBlogController::class,'destroy']);

});
