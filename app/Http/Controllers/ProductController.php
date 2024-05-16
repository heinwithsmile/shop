<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $products = Product::with('images')->with('category')->orderBy('id', 'desc')->paginate(10);
        if(isset($search)){
            $products = Product::where('name', 'like', "%$search%")
                    ->with('images')
                    ->with('category')
                    ->paginate(10);
        }
        return view('admin.product.list')
                ->with("products", $products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.add')->with("categories" ,$categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $products = $this->validate($request, [
            'name' => 'string|required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'description' => 'string|required',
        ]);
        $photos = $this->validate($request, ['photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
        if($request->hasFile('photo')){
            $photos['photo'] = $request->file('photo')->store('images/products/', 'public');
        }

        $product = Product::create($products);
        $photos['product_id'] = $product->id;
        ProductImage::create($photos);
        return redirect()->route('product.index')->with('message', 'Product Add Successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.detail')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $category = Category::findOrFail($product->category_id);
        $photo = ProductImage::where('product_id', $product->id)->first();
        $categories = Category::all();
        return view('admin.product.edit')
            ->with('product', $product)
            ->with('photo', $photo)
            ->with('category', $category)
            ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $images = $request->validate(['photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048']);

        if($request->hasFile('photo')){
            $images['photo'] = $request->file('photo')->store('images/products/', 'public');
        }
        
        $product->update($formFields);
        $productImage = new ProductImage();
        $productImage->update($images);
        return redirect()->route('product.index')->with('message', 'product Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('message', 'product deleted');
    }
}
