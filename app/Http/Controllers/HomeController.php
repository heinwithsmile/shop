<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // For Feature Category
        $categories = Category::limit(5)->get();

        // For New Products
        $products_categories = Category::with(['products.images'])->get();
        return view('index')
            ->with('categories', $categories)
            ->with('products_categories', $products_categories);
    }
}
