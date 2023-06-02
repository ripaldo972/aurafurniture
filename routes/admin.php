<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GalleryProductController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\WorkshopController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::prefix('/dashboard')->middleware(['auth'])->group(function() {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::post('/setting/store', [SettingController::class, 'store'])->name('setting.store');
    Route::patch('/setting/update/{id}', [SettingController::class, 'update'])->name('setting.update');

    Route::prefix('/product')->group(function() {

        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/show/{id}', [ProductController::class, 'show'])->name('product.show');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::patch('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

        // category
        Route::get('/categories', [ProductCategoryController::class, 'index'])->name('category.index');
        Route::post('/category/store', [ProductCategoryController::class, 'store'])->name('category.store');
        Route::patch('/category/update/{id}', [ProductCategoryController::class, 'update'])->name('category.update');
        Route::delete('/category/destroy/{id}', [ProductCategoryController::class, 'destroy'])->name('category.destroy');

        // gallery
        Route::post('/gallery/store', [GalleryProductController::class, 'store'])->name('gallery.store');
        Route::delete('/gallery/destroy/{id}', [GalleryProductController::class, 'destroy'])->name('gallery.destroy');
    });

    // Sliders
    Route::get('/sliders', [SliderController::class, 'index'])->name('slider.index');
    Route::post('/slider/store', [SliderController::class, 'store'])->name('slider.store');
    Route::patch('/slider/update/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::delete('/slider/destroy/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');

    // Workshops
    Route::get('/workshops', [WorkshopController::class, 'index'])->name('workshop.index');
    Route::post('/workshop/store', [WorkshopController::class, 'store'])->name('workshop.store');
    Route::patch('/workshop/update/{id}', [WorkshopController::class, 'update'])->name('workshop.update');
    Route::delete('/workshop/destroy/{id}', [WorkshopController::class, 'destroy'])->name('workshop.destroy');

    Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
    Route::post('/portfolio/store', [PortfolioController::class, 'store'])->name('portfolio.store');
    Route::patch('/portfolio/update/{id}', [PortfolioController::class, 'update'])->name('portfolio.update');
    Route::delete('/portfolio/destroy/{id}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');

    Route::get('/about-us', [AboutController::class, 'index'])->name('about.index');
    Route::post('/about-us/store', [AboutController::class, 'store'])->name('about.store');
    Route::patch('/about-us/update/{id}', [AboutController::class, 'update'])->name('about.update');

    Route::get('/faqs', [FaqController::class, 'index'])->name('faq.index');
    Route::post('/faqs/store', [FaqController::class, 'store'])->name('faq.store');
    Route::patch('/faqs/update/{id}', [FaqController::class, 'update'])->name('faq.update');

});
