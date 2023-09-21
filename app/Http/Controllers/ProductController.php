<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
    
    public function create()
    {
        return view(('products.create'));
    }
    
    public function destroy($id)
    {
        //Busqueda del producto
        $product = Product::findOrFail($id);

        //Eliminacion del producto
        $product->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('products.index')->with('status', 'Producto eliminado satifactoriamente!');
    }
    
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', ['product'=>$product]);
    }

}
