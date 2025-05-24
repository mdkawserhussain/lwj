<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PostController::class,'index'] )->name('home');

Route::middleware(['auth'])->group(function () {
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/posts/create', [PostController::class,'create'] )->name('posts.create');
    Route::post('/posts',action: [PostController::class,'store'] )->name('posts.store');
    Route::get('/posts/{post}/edit',[PostController::class,'edit'] )->name('posts.edit');
    Route::put('/posts/{post}',[PostController::class,'update'] )->name('posts.update');
    Route::delete('/posts/{post}',[PostController::class,'destroy'] )->name('posts.destroy');
    Route::get('/{user:id}/posts',[PostController::class,'userPosts'] )->name('users.posts'); 
    

});


Route::middleware(['guest'])->group(function () {
    /**Auth */
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register',[AuthController::class,'register'] );
    Route::view('/login', 'auth.login')->name('login'); 
    Route::post('/login',[AuthController::class,'login'] );


    
});

Route::get('/posts/{post}',[PostController::class,'show'] )->name('posts.show');






