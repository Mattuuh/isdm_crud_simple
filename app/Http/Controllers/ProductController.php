<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();

        return view('products.index', [
            'products' => DB::table('products')->paginate(10)
        ]);
    }
    
    // Create
    public function create()
    {
        return view(('products.create'));
    }
    
    // Store
    public function store() {
        
    }
    
    // Edit
    public function edit() {
        
    }
    
    // Update
    public function update() {
        
    }
    
    // Destroy
    public function destroy($id) {
        //Busqueda del producto
        $product = Product::findOrFail($id);

        //Eliminacion del producto
        $product->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('products.index')->with('status', 'Producto eliminado satifactoriamente!');
    }
    
    // Show
    public function show($id) {
        $product = Product::findOrFail($id);
        return view('products.show', ['product'=>$product]);
    }

}
