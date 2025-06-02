<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

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
        // Hero section slider
        $banners = Banner::all();

        // For Feature Category
        $categories = Category::limit(5)->get();

        // For New Products
        $products_categories = Category::with(['products.images'])->get();
        // dd($products_categories);
        return view('index')
            ->with('categories', $categories)
            ->with('products_categories', $products_categories)
            ->with('banners', $banners);
    }
}
