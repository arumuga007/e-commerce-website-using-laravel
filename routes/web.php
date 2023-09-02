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
Route::get('/log-out', [AdminController::class, 'logout']);
Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth');
Route::post('/change-password', [AdminController::class, 'changePassword']);


Route::middleware(['adminonly'])->group(function() {
Route::get('/view_category', [AdminController::class, 'view_category']);
Route::match(['get', 'post'], '/add_category', [AdminController::class, 'add_category'])->middleware('handleRequest');
Route::get('/edit_category/{id}', [AdminController::class, 'edit'])->name('edit_category');
Route::match(['get', 'post'],'/modify_category/{id}', [AdminController::class, 'modify_category']);
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);

});

Route::middleware(['adminonly'])->group(function() {
Route::get('/view_product', [AdminController::class, 'view_product']);
Route::post('/add_product', [AdminController::class, 'add_product']);
Route::get('/show_product', [AdminController::class, 'show_product']);
Route::get('/edit_product/{id}', [AdminController::class, 'edit_product'])->name('edit_product');
Route::post('/modify_product/{id}', [AdminController::class, 'modify_product']);
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
Route::post('search-product', [AdminController::class, 'searchProduct']);

});
Route::middleware(['adminonly'])->group(function() {
Route::get('/view_subcategory', [AdminController::class, 'view_subcategory']);
Route::get('/show_subcategory', [AdminController::class, 'show_subcategory']);
Route::get('/delete_subcategory', [AdminController::class, 'delete_subcategory']);
Route::get('/edit_subcategory', [AdminController::class, 'edit_subcategory']);
Route::post('/add_subcategory', [AdminController::class, 'add_subcategory']);
Route::post('/api/post-subcategory', [AdminController::class, 'post_subcategory']);
Route::post('/api/submit-edit-subcategory', [AdminController::class, 'submit_edit_subcategory']);

});


Route::middleware(['adminonly'])->group(function() {
Route::get('/view_orders', [AdminController::class, 'view_orders']);
Route::post('search-order', [AdminController::class, 'searchOrder']);
Route::get('/updateDeliveryStatus', [AdminController::class, 'update_delivery']);


});


Route::get('/api/get-products', [HomeController::class, 'getProducts']);
Route::get('/product-details', [HomeController::class, 'productDetails']);
Route::get('/product-details/{id}', [HomeController::class, 'productDetails']);

Route::middleware(['auth'])->group(function() {
Route::post('/api/addcart', [HomeController:: class, 'add_cart']);
Route::get('/cart_products', [HomeController::class, 'cart_products']);
Route::get('/api/remove-cartItem', [HomeController::class, 'RemoveCartItem']);
Route::get('/api/updateQuantity', [HomeController::class, 'updateQuantity']);

});

Route::middleware(['auth'])->group(function() {
Route::get('/place-order',[HomeController::class, 'place_order']);
Route::get('/order-using-buynow',[HomeController::class, 'orderUsingBuyNow']);

});

Route::post('/api/update-user', [AdminController:: class, 'updateUser'])->middleware(['auth']);


Route::middleware(['auth'])->group(function() {
Route::post('/confirm_order', [HomeController::class, 'confirm_order']);
Route::post('/confirm_order_buynow', [HomeController::class, 'confirmOrderBuynow']);
Route::get('ordered_products',[HomeController::class, 'ordered_products']);
Route::get('/api/cancel-order', [HomeController::class, 'cancelOrder']);

});
Route::get('/api/rate-product', [HomeController::class, 'rateProduct']);

Route::get('api/getproducts-using-search',[HomeController::class, 'getProductsUsingSearch']);