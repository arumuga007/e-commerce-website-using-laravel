<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('home.userpage');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [HomeController::class, 'redirect']);
Route::get('/view_category', [AdminController::class, 'view_category']);
Route::post('/add_category', [AdminController::class, 'add_category']);
Route::get('/edit_category/{id}', [AdminController::class, 'edit'])->name('edit_category');
Route::post('/modify_category/{id}', [AdminController::class, 'modify_category']);
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
Route::get('/view_product', [AdminController::class, 'view_product']);
Route::post('/add_product', [AdminController::class, 'add_product']);
Route::get('/show_product', [AdminController::class, 'show_product']);
Route::get('/edit_product/{id}', [AdminController::class, 'edit_product'])->name('edit_product');
Route::post('/modify_product/{id}', [AdminController::class, 'modify_product']);
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
Route::get('/view_subcategory', [AdminController::class, 'view_subcategory']);
Route::post('/add_subcategory', [AdminController::class, 'add_subcategory']);
Route::post('/api/post-subcategory', [AdminController::class, 'post_subcategory']);
Route::get('/api/get-products', [HomeController::class, 'getProducts']);
Route::get('/product-details', [HomeController::class, 'productDetails']);
Route::post('/api/addcart', [HomeController:: class, 'add_cart']);
Route::get('/cart_products', [HomeController::class, 'cart_products']);
Route::get('/place-order',[HomeController::class, 'place_order']);
Route::post('/confirm_order', [HomeController::class, 'confirm_order']);


