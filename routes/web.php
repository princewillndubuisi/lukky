<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [BlogController::class, 'welcome']);

// User Routes
Route::get('read_post/{id}', [BlogController::class, 'read_post'])->name('read.post');

Route::get('home', [BlogController::class, 'home'])->middleware('auth')->name('home');

Route::get('create_post', [BlogController::class, 'create_post'])->middleware('auth')->name('create.post');

Route::post('user_post', [BlogController::class, 'user_post'])->middleware('auth')->name('user.post');

Route::get('profiles', [BlogController::class, 'profiles'])->middleware('auth')->name('profiles');

Route::get('user_post_del/{id}', [BlogController::class, 'user_post_del'])->middleware('auth')->name('user_post.del');

Route::get('user_post_edit/{id}', [BlogController::class, 'user_post_edit'])->middleware('auth')->name('user_post.edit');

Route::post('user_post_update/{id}', [BlogController::class, 'user_post_update'])->middleware('auth')->name('user_post.update');

// Route::post('edit_user/{id}', [BlogController::class, 'edit_user'])->middleware('auth')->name('edit.user');
// End User Routes


// Admin Routes

// Post routes
Route::get('post_page', [AdminController::class, 'post_page'])->name('post.page');

Route::post('add_post', [AdminController::class, 'add_post'])->name('add.post');

Route::get('show_post', [AdminController::class, 'show_post'])->name('show.post');

Route::get('delete_post/{id}', [AdminController::class, 'delete_post'])->name('delete.post');

Route::get('edit_page/{id}', [AdminController::class, 'edit_page'])->name('edit.page');

Route::post('update_post/{id}', [AdminController::class, 'update_post'])->name('update.post');

Route::get('accept_post/{id}', [AdminController::class, 'accept_post'])->name('accept.post');

Route::get('reject_post/{id}', [AdminController::class, 'reject_post'])->name('reject.post');
// End post routes

// Category routes
Route::get('show_category', [AdminController::class, 'show_category'])->name('show.category');

Route::get('category_page', [AdminController::class, 'category_page'])->name('category.page');

Route::post('add_category', [AdminController::class, 'add_category'])->name('add.category');

Route::get('delete_category/{id}', [AdminController::class, 'delete_category'])->name('delete.category');

Route::get('edit_category_page/{id}', [AdminController::class, 'edit_category_page'])->name('edit.category_page');

Route::post('update_category/{id}', [AdminController::class, 'update_category'])->name('update.category');
// End category routes

// End Admin Routes


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
