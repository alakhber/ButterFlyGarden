<?php

use App\Http\Controllers\Project\BackEnd\AboutController;
use App\Http\Controllers\Project\BackEnd\BlogController;
use App\Http\Controllers\Project\BackEnd\CategoryController;
use App\Http\Controllers\Project\BackEnd\ContactController as BackEndContactController;
use App\Http\Controllers\Project\BackEnd\HomeController;
use App\Http\Controllers\Project\BackEnd\ImageController;
use App\Http\Controllers\Project\BackEnd\PageController;
use App\Http\Controllers\Project\BackEnd\PartnerController;
use App\Http\Controllers\Project\BackEnd\PersonalController;
use App\Http\Controllers\Project\BackEnd\ProductController;
use App\Http\Controllers\Project\BackEnd\ProjectController;
use App\Http\Controllers\Project\BackEnd\ServiceController;
use App\Http\Controllers\Project\BackEnd\SettingController;
use App\Http\Controllers\Project\BackEnd\SliderController;
use App\Http\Controllers\Project\BackEnd\SubscriptionController;
use App\Http\Controllers\Project\BackEnd\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'main'])->name('home');

Route::prefix('user')->name('user.')->controller(UserController::class)->group(function () {
    Route::get('/profil', 'profil')->name('profil');
    Route::patch('/profil/{user}', 'updateProfil')->name('update.profil');
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/create', 'store')->name('store');
    Route::get('/show/{user}', 'show')->name('show');
    Route::patch('/show/{user}', 'update')->name('update');
    Route::delete('/{user}', 'destroy')->name('delete');
    Route::put('/status/{user}', 'status')->name('status');
    Route::put('/type/{user}', 'type')->name('type');
});

Route::prefix('category')->name('category.')->controller(CategoryController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/create', 'store')->name('store');
    Route::get('/show/{category}', 'show')->name('show');
    Route::patch('/show/{category}', 'update')->name('update');
    Route::delete('/{category}', 'destroy')->name('delete');
    Route::put('/status/{category}', 'status')->name('status');
});

Route::prefix('contact')->name('contact.')->controller(BackEndContactController::class)->group(function () {
    Route::get('/', 'contact')->name('index');
    Route::patch('/', 'contactUpdate')->name('update');
});

Route::prefix('product')->name('product.')->controller(ProductController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/create', 'store')->name('store');
    Route::get('/show/{product}', 'show')->name('show');
    Route::patch('/show/{product}', 'update')->name('update');
    Route::delete('/{product}', 'destroy')->name('delete');
    Route::put('/status/{product}', 'status')->name('status');
    Route::prefix('{product}/gallery')->name('gallery.')->group(function () {
        Route::get('/', 'gallery')->name('index');
        Route::put('/', 'sortable')->name('sortable');
        Route::post('/upload', 'uploads')->name('upload');
        Route::delete('/{image}', 'deleteImage')->name('delete');
    });
});
Route::prefix('blog')->name('blog.')->controller(BlogController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/create', 'store')->name('store');
    Route::get('/show/{blog}', 'show')->name('show');
    Route::patch('/show/{blog}', 'update')->name('update');
    Route::delete('/{blog}', 'destroy')->name('delete');
    Route::put('/status/{blog}', 'status')->name('status');
    Route::prefix('{blog}/gallery')->name('gallery.')->group(function () {
        Route::get('/', 'gallery')->name('index');
        Route::put('/', 'sortable')->name('sortable');
        Route::post('/upload', 'uploads')->name('upload');
        Route::delete('/{image}', 'deleteImage')->name('delete');
    });
});

Route::prefix('page')->name('page.')->controller(PageController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{page}', 'show')->name('show');
    Route::patch('/show/{page}', 'update')->name('update');
    Route::delete('/delete/{page}', 'destroy')->name('delete');
    Route::put('/status/{page}', 'status')->name('status');
});

Route::prefix('partner')->name('partner.')->controller(PartnerController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{partner}', 'show')->name('show');
    Route::patch('/show/{partner}', 'update')->name('update');
    Route::delete('/delete/{partner}', 'destroy')->name('delete');
    Route::put('/status/{partner}', 'status')->name('status');
});
Route::prefix('slider')->name('slider.')->controller(SliderController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{slider}', 'show')->name('show');
    Route::patch('/show/{slider}', 'update')->name('update');
    Route::delete('/delete/{slider}', 'destroy')->name('delete');
    Route::put('/status/{slider}', 'status')->name('status');
    Route::put('/', 'sortable')->name('sortable');
});
Route::prefix('subscription')->name('subscriptions.')->controller(SubscriptionController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{subscriptions}', 'show')->name('show');
    Route::patch('/show/{subscriptions}', 'update')->name('update');
    Route::delete('/delete/{subscriptions}', 'destroy')->name('delete');
    Route::put('/status/{subscriptions}', 'status')->name('status');
});
Route::prefix('image')->name('image.')->controller(ImageController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/store', 'store')->name('store');
    Route::delete('/delete/{image}', 'destroy')->name('delete');
});

Route::prefix('service')->name('service.')->controller(ServiceController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/create', 'store')->name('store');
    Route::get('/show/{service}', 'show')->name('show');
    Route::patch('/show/{service}', 'update')->name('update');
    Route::delete('/{service}', 'destroy')->name('delete');
    Route::put('/status/{service}', 'status')->name('status');
    Route::prefix('{service}/gallery')->name('gallery.')->group(function () {
        Route::get('/', 'gallery')->name('index');
        Route::put('/', 'sortable')->name('sortable');
        Route::post('/upload', 'uploads')->name('upload');
        Route::delete('/{image}', 'deleteImage')->name('delete');
    });
});
Route::prefix('project')->name('project.')->controller(ProjectController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/create', 'store')->name('store');
    Route::get('/show/{project}', 'show')->name('show');
    Route::patch('/show/{project}', 'update')->name('update');
    Route::delete('/{project}', 'destroy')->name('delete');
    Route::put('/status/{project}', 'status')->name('status');
    Route::prefix('{project}/gallery')->name('gallery.')->group(function () {
        Route::get('/', 'gallery')->name('index');
        Route::put('/', 'sortable')->name('sortable');
        Route::post('/upload', 'uploads')->name('upload');
        Route::delete('/{image}', 'deleteImage')->name('delete');
    });
});

Route::prefix('setting')->name('setting.')->controller(SettingController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::patch('/', 'update')->name('update');
});

Route::prefix('about')->name('about.')->controller(AboutController::class)->group(function () {
    Route::get('/', 'about')->name('index');
    Route::patch('/', 'aboutUpdate')->name('update');
});

Route::prefix('personal')->name('personal.')->controller(PersonalController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{personal}', 'show')->name('show');
    Route::patch('/show/{personal}', 'update')->name('update');
    Route::delete('/delete/{personal}', 'destroy')->name('delete');
    Route::put('/status/{personal}', 'status')->name('status');
});