<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerPost;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/posts', [ControllerPost::class, 'getScreenPosts'])->name('posts');

    Route::get('/posts/{id}', [ControllerPost::class, 'getPostFromId']);
    
    Route::get('/post/new', [ControllerPost::class, 'createPost'])->name('newPost');
    
    Route::post('/posts', [ControllerPost::class, 'newPost']);
    
    Route::delete('/posts/{id}', [ControllerPost::class, 'deletePost']);    

    Route::get('/', [ControllerPost::class, 'redirectHome']);

});
