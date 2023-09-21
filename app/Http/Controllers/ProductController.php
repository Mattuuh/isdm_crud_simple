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

}
