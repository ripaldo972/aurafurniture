<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\WorkshopController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index']);

Route::get('/categories', [ProductCategoryController::class, 'index']);
Route::get('/sliders', [SliderController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{slug}', [ProductController::class, 'detail']);
Route::get('/product/category/{slug}', [ProductCategoryController::class, 'byCategory']);

Route::get('/about', [AboutController::class, 'index']);
Route::get('/workshops', [WorkshopController::class, 'index']);
Route::get('/portfolio', [PortfolioController::class, 'index']);
Route::get('/faqs', [FaqController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);

Route::post('/order/email/{id}', [ProductController::class, 'order']);
Route::post('/contact/email/send', [ContactController::class, 'send']);

