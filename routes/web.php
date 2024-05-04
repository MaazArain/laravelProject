<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Stripe\Stripe;

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


Route::get("/", [HomeController::class,"userpage"]);
Route::get('/home' , [HomeController::class , 'redirect']);
Route::get('/productDetails/{id}' , [HomeController::class , 'productDetails']);
// Add To Cart
Route::post('/addCart/{id}' , [HomeController::class , 'addToCart']);
Route::get('/show_cart' , [HomeController::class , 'showCart']);
Route::get('/delete_cart/{id}' , [HomeController::class , 'deleteCart']);
Route::get('/cash_order' , [HomeController::class , 'cashOrder']);
Route::match(['GET' , 'POST'] ,'/stripe' ,[HomeController::class , 'stripe']);
// Route::get('stripe/{subTotal}' , [HomeController::class , 'stripe']);
// Route::post('stripe/{subTotal}', [HomeController::class, 'stripePost'])->name('stripe.post');
// Route Categories
Route::get('/addCategory' , [AdminController::class , 'add_category']);
Route::get('/viewCategory' , [AdminController::class , 'viewCategory']);
Route::get('deleteCategory/{id}' , [AdminController::class , 'delete']);
Route::post('/postCategory' , [AdminController::class , 'post_category']);
Route::get('/editCategory/{id}' , [AdminController::class , 'editCategory']);
Route::PUT('/updateCategory/{id}' , [AdminController::class , 'updateCategory']);
Route::get('showCategory/' , [CategoryController::class , 'checkCategory']);
Route::get('viewCategories/{id}' , [CategoryController::class , 'viewCategories']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
// Product Route Work
Route::get('/addProducts' , [AdminController::class , 'addPro']);
Route::post('/addProductPost' , [AdminController::class , 'postProduct']);
Route::get('/showProduct' , [AdminController::class , 'viewProduct']);
Route::get('/editProduct/{id}' , [AdminController::class , 'editProduct']);
Route::post('updateProduct/{id}' , [AdminController::class , 'updateProduct']);
Route::get('delete_product/{id}' , [AdminController::class , 'deleteProduct']);
