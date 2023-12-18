<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class HomeController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(5); //Using Eloquent Model
        // $products = DB::table('products')->get(); //Using Database Class
        return view('index', ['products'=>$products]);
    }
}
