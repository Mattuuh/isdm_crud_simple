<?php
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Middleware\Authenticate;

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
    return view('welcome');
});

Route::get('auth/google',[GoogleController::class,'redirectToGoogle']);
Route::get('/google/callback',[GoogleController::class,'handleGoogleCallback']);

Auth::routes();

Route::get('/products',[ProductController::class,'index'])->name('products.index')->middleware(Authenticate::class);
Route::post('/products', [ProductController::class, 'store'])->name('products.store')->middleware(Authenticate::class);// route store
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create')->middleware(Authenticate::class); // route create
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show')->middleware(Authenticate::class); // route show
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update')->middleware(Authenticate::class);// route update
Route::delete('(products/{product}', [   ProductController::class, 'destroy'])->name('products.destroy')->middleware(Authenticate::class); // route destroy
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit')->middleware(Authenticate::class);// route edit

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(Authenticate::class);
