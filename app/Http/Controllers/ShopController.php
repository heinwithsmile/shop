<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('pages.shop')->with('products', $products);
    }

    public function detail($id){
        $product = DB::table('products')
                            ->where('id', $id)
                            ->get();
        // ddd($product);
        return view('pages.detail')->with('product', $product);
    }
}
