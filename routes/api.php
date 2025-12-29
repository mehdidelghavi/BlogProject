<?php

use App\Http\Controllers\v1\ArticlesController;
use App\Http\Controllers\v1\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::middleware('auth:api')->group( function (){
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('/articles/', [ArticlesController::class, 'show'])->name('articles.show');
        Route::get('/articles/show/{article}',[ArticlesController::class, 'view'])->name('articles.view');
        Route::get('/articles/search/', [ArticlesController::class, 'search'])->name('articles.search');
        Route::post('/articles/store', [ArticlesController::class, 'store'])->name('articles.store');
        Route::post('/articles/update/{article}', [ArticlesController::class, 'update'])->name('articles.update');
        Route::delete('/articles/delete/{article}', [ArticlesController::class, 'delete'])->name('articles.delete');
    });
});
