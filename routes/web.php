<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
use Illuminate\Routing\Console\MiddlewareMakeCommand;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'home']);

// Route::get('/dashboard', function () {
//     return view('home.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

route::get('/dashboard', [HomeController::class, 'login_home'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin']);
// Category
route::post('add_category', [AdminController::class, 'add_category'])->middleware(['auth', 'admin']);
route::get('view_category', [AdminController::class,'view_category'])->middleware(['auth', 'admin']);
route::get('edit_category/{id}',[AdminController::class, 'edit_category'])->middleware(['auth', 'admin']);
route::post('update_category/{id}', [AdminController::class, 'update_category'])->middleware(['auth', 'admin']);
route::get('delete_category/{id}', [AdminController::class,'delete_category'])->middleware(['auth', 'admin']);



// Product

route::get('add_product', [AdminController::class, 'add_product'])->middleware(['auth','admin']);
route::post('upload_product', [AdminController::class, 'upload_product'])->Middleware(['auth', 'admin']);
route::get('view_product',[AdminController::class, 'view_product'])->middleware(['auth','admin']);
route::get('edit_product/{id}',[AdminController::class, 'edit_product'])->middleware(['auth','admin']);
route::post('update_product/{id}',[AdminController::class, 'update_product'])->middleware(['auth','admin']);
route::get('delete_product/{id}', [AdminController::class, 'delete_product'])->middleware(['auth','admin']);
route::get('search_product', [AdminController::class, 'search_product'])->middleware(['auth', 'admin']);
route::get('details_product/{id}', [HomeController::class, 'details_product']);
route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->middleware(['auth', 'verified']);
route::get('mycart', [HomeController::class, 'mycart'])->middleware(['auth', 'verified']);
route::get('remove_cart/{id}', [HomeController::class, 'remove_cart'])->middleware(['auth', 'verified']);
route::post('order_confirm', [HomeController::class, 'order_confirm'])->middleware(['auth', 'verified']);



