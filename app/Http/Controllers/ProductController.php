<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        return view('products.index', [
            'products' => DB::table('products')->paginate(10)
        ]);
    }
    
    // Create
    public function create()
    {
        return view('products.create');
    }
    
    // Store
    public function store(Request $request)
    {
        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
            'description' => 'nullable|string|max:255',
            'unit_price' => 'required|gt:0',
            'stock' => 'nullable|gt:0',
        ]);

        //Guardado de los datos
        Product::create($request->all());

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('products.index')->with('status','Producto creado satisfactoriamente!');
    }
    
    // Edit
    public function edit($id)
     {
        $product = Product::findOrFail($id);
        return view('products.edit', ['product'=>$product]);
     }
    
    // Update
     public function update(Request $request,$id)
     {
        //Busqueda del producto
        $product = Product::findOrFail($id);

        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
            'description' => 'nullable|string|max:255',
            'unit_price' => 'required|gt:0',
            'stock' => 'nullable|gt:0',
        ]);

        //Actualizacion del Producto
        $product->update($request->all());

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('products.index')->with('status', 'Producto actualizado satisfactoriamente!');
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
