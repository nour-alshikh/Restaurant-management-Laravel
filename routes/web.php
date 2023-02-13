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
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/' , [HomeController::class, 'index']);
Route::get('redirect' , [HomeController::class, 'redirect']);

Route::get('users' , [AdminController::class, 'users']);
Route::get('delete/{id}' , [AdminController::class, 'delete']);

Route::get('menu' , [AdminController::class, 'menu']);
Route::post('store_menu' , [AdminController::class, 'store_menu']);
Route::get('delete_item/{id}' , [AdminController::class, 'delete_item']);
Route::get('edit_item/{id}' , [AdminController::class, 'edit_item']);
Route::post('update_menu/{id}' , [AdminController::class, 'update_menu']);

Route::post('store_reservation' , [AdminController::class, 'store_reservation']);
Route::get('reservation' , [AdminController::class, 'reservation']);

Route::get('add_chefs' , [AdminController::class, 'chefs']);
Route::post('create_chef' , [AdminController::class, 'create_chef']);
Route::get('delete_chef/{id}' , [AdminController::class, 'delete_chef']);
Route::get('edit_chef/{id}' , [AdminController::class, 'edit_chef']);
Route::post('update_chef/{id}' , [AdminController::class, 'update_chef']);

Route::get('cart' , [HomeController::class, 'cart']);
Route::post('add_cart/{id}' , [HomeController::class, 'add_cart']);
Route::get('del_cart/{id}' , [HomeController::class, 'del_cart']);

Route::post('confirm_order' , [HomeController::class, 'confirm_order']);

Route::get('orders' , [AdminController::class, 'orders']);




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
