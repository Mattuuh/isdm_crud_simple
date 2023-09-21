<?php
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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

Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');// route store
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create'); // route create
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show'); // route show
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');// route update
Route::delete('(products/{product}', [   ProductController::class, 'destroy'])->name('products.destroy'); // route destroy
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');// route edit




