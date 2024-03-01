<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index(Request $request){
        // $products = Product::query();
        $categories = Category::all();
        foreach ($categories as $key => $category) {
            $count[] = Product::where('category_id', $category->id)->count();
        }
        if(!empty($request->has('category'))){
            $slugs = explode(',', $request->input('category'));
            $slugs = array_map('trim', $slugs);
            $slugs = array_filter($slugs);

            if(!empty($slugs)){
                $cat_ids = Category::whereIn('name', $slugs)->pluck('id')->all();
                if(!empty($cat_ids)){
                    $products = Product::whereIn('category_id', $cat_ids)->get();
                }
            }
        }

        if(!empty($request->has('price'))){
            $slug = trim($request->input('price'));
            if(!empty($slug) && $slug === "htl"){
                $products = Product::orderByDesc('price')->get();
            }elseif(!empty($slug) && $slug === "lth"){
                $products = Product::orderBy('price')->get();
            }
        }

        if(empty($products)){
            $products = Product::where('status','active')->paginate(6);
        }
        return view('pages.shop')
            ->with('products', $products)
            ->with('categories', $categories)
            ->with('cat_count', $count);
    }

    public function detail($id){
        $product = DB::table('products')
                            ->where('id', $id)
                            ->get();
        return view('pages.detail')->with('product', $product);
    }
}
