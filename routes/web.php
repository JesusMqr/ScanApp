<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/',[PostController::class, 'index'])->name('post.index');

Route::get('/chapters', [ChapterController::class,'index'])->name('chapter.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // RUTAS POSTS
    
    Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::post('/posts', [PostController::class, 'store'])->name('post.store');
    Route::put('/posts/{id}', [PostController::class,'update'])->name('post.update');
    
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('post.destroy');

    //RUTAS CHAPERS
    Route::get('/chapters/create/{origin}', [ChapterController::class, 'create'])->name('chapter.create');
    
    Route::get('/chapters/{id}/edit', [ChapterController::class, 'edit'])->name('chapter.edit');
    Route::post('/chapters', [ChapterController::class, 'store'])->name('chapter.store');
    Route::put('/chapters/{id}', [ChapterController::class,'update'])->name('chapter.update');
    
    Route::delete('/chapters/{id}', [ChapterController::class, 'destroy'])->name('chapter.destroy');

    //RUTA IMAGES
    Route::get('/images/create/{origin}', [ImageController::class, 'create'])->name('image.create');
    Route::post('/images', [ImageController::class, 'store'])->name('image.store');
    Route::delete('/images/{id}', [ImageController::class, 'destroy'])->name('image.destroy');

    

});
//RUTAS LIBRES (API)

Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');
Route::get('/chapters/{id}', [ChapterController::class, 'show'])->name('chapter.show');

require __DIR__.'/auth.php';
