<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/services', [HomeController::class,'services'])->name('services');
Route::get('/service/{slug}', [HomeController::class,'service'])->name('service');
Route::get('/about', [HomeController::class,'about'])->name('about');
Route::get('/blogs', [HomeController::class,'blogs'])->name('blogs');
Route::get('/contact', [HomeController::class,'contact'])->name('contact');
Route::get('/blog/{slug}', [HomeController::class,'blog'])->name('blog');
Route::get('/projects', [HomeController::class,'projects'])->name('projects');
Route::get('/project/{slug}', [HomeController::class,'project'])->name('project');
Route::get('/products/{slug?}', [HomeController::class,'products'])->name('products');
Route::get('/product/{slug}', [HomeController::class,'product'])->name('product');
Route::get('/page/{slug}', [HomeController::class,'page'])->name('page');
Route::post('/subscription', [HomeController::class,'subscription'])->name('subscription');
Route::post('/contact', [HomeController::class,'contactMail'])->name('contact-mail');

// Route::get('/products-by-category/{slug}', [HomeController::class,'productsByCategory'])->name('products-by-category');

Auth::routes();

