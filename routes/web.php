<?php

use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::get('/' , [\App\Http\Controllers\HomeController::class , 'index']);
Route::get('/test' , function(){
//    $user = User::find(1);
//    return  $user->blogs()->get();


    $blog = Blog::find(1);
    return $blog->user;
});
Route::get('/page/{page}' , [\App\Http\Controllers\HomeController::class , 'page'])->name('page');
Route::get('/single/{blog}' , [\App\Http\Controllers\HomeController::class , 'single'])->name('single');
Route::get('/img/{file_manager}' , [\App\Http\Controllers\Admin\FileManagerController::class , 'show'])->name('file-manager.show');
Route::get('/search', [\App\Http\Controllers\HomeController::class , 'search'])->name('search');

Route::prefix('/admin')->group(
    function()
    {
        Route::get('/' , function(){
            return redirect()->route('blog.index');
        })->middleware('auth');
//        Route::get('/blogs' , [\App\Http\Controllers\Admin\BlogController::class,'index']);
        Route::resource('blog',\App\Http\Controllers\Admin\BlogController::class)->except(['show']);
        Route::resource('file-manager',\App\Http\Controllers\Admin\FileManagerController::class)->except(['show']);
    }
);

Auth::routes();
