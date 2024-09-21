<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\TestmonialController;
use App\Http\Controllers\Admin\TopicController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\public\PublicController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('verified');

/* Route::get('registerForm', function () {
return view('auth.register');
})->name('registerForm'); */

Route::prefix('admin')->group(function () {
    Route::group([
        'prefix' => 'users',
        'middleware' => 'verified',
    ], function () {

        Route::get('users/index', [UserController::class, 'index'])->name('users.index');
        Route::get('create', [UserController::class, 'create'])->name('users.create');
        Route::post('store', [UserController::class, 'store'])->name('users.store');
        Route::get('{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('{id}', [UserController::class, 'update'])->name('users.update');
    });

    Route::prefix('categories')->group(function () {
        Route::get('index', [CategoryController::class, 'index'])->name('categories.index');
    
        Route::get('create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('{id}/delete', [CategoryController::class, 'destroy'])->name('categories.destroy');
    
    });

    Route::prefix('topics')->group(function () {
        Route::get('index', [TopicController::class, 'index'])->name('topics.index');
        Route::get('create', [TopicController::class, 'create'])->name('topics.create');
        Route::post('', [TopicController::class, 'store'])->name('topics.store');
        Route::get('{id}/edit', [TopicController::class, 'edit'])->name('topics.edit');
        Route::get('{id}/show', [TopicController::class, 'show'])->name('topics.show');
        Route::put('{id}', [TopicController::class, 'update'])->name('topics.update');
        Route::delete('{id}/delete', [TopicController::class, 'destroy'])->name('topics.destroy');
    
    });

    Route::prefix('testmonials')->group(function () {
        Route::get('', [TestmonialController::class, 'index'])->name('testmonials.index');
        Route::get('create', [TestmonialController::class, 'create'])->name('testmonials.create');
        Route::post('', [TestmonialController::class, 'store'])->name('testmonials.store');
        Route::get('{id}/edit', [TestmonialController::class, 'edit'])->name('testmonials.edit');
        Route::put('{id}', [TestmonialController::class, 'update'])->name('testmonials.update');
        Route::get('{id}/delete', [TestmonialController::class, 'destroy'])->name('testmonials.destroy');
        Route::patch('{id}', [TestmonialController::class, 'restore'])->name('testmonials.restore');
        Route::delete('{id}/forcedelete', [TestmonialController::class, 'forcedelete'])->name('testmonials.forcedelete');
    });

    Route::prefix('messages')->group(function () {
        Route::get('', [MessageController::class, 'index'])->name('messages.index');
        Route::get('create', [MessageController::class, 'create'])->name('messages.create');
        Route::post('', [MessageController::class, 'store'])->name('messages.store');
        Route::get('{id}/edit', [MessageController::class, 'edit'])->name('messages.edit');
        Route::put('{id}', [MessageController::class, 'update'])->name('messages.update');
        Route::get('{id}/delete', [MessageController::class, 'destroy'])->name('messages.destroy');
     
    });

});

Auth::routes(['verify' => true]);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('test', function () {
    return 'hello';
});


Route::prefix('publicPages')->group(function () {

    Route::get('index', [PublicController::class, 'index'])->name('public.index');
    Route::get('contactUs', [MessageController::class, 'contactUs'])->name('messages.create');
    Route::post('', [MessageController::class, 'storeMessage'])->name('messages.store');
    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('{id}/show', [MessageController::class, 'show'])->name('messages.show');
    Route::delete('{id}/delete', [MessageController::class, 'destroy'])->name('messages.destroy');

});

Route::get('{id}/lala', [PublicController::class, 'topic_show'])->name('public.topic.show');
Route::get('testmonials_show', [PublicController::class, 'testmonials_show'])->name('public.testmonials');
Route::get('topics-listing', [PublicController::class, 'topics_listing'])->name('public.topics-listing');
// Route::post('/articles/{id}/increment-views', [PublicController::class, 'incrementViews'])->name('topics.incrementViews');
