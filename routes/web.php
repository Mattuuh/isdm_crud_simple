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
// route store
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create'); 
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show'); // route show
// route update
Route::delete('(products/{product}', [   ProductController::class, 'destroy'])->name('products.destroy'); // route destroy
// route edit
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
