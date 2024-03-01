<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.list')->with("products", $products);
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
        $data = $this->validate($request, [
            'photo' => 'required',
            'name' => 'string|required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'description' => 'string|required',
        ]);
        if($request->hasFile('photo')){
            $data['photo'] = $request->file('photo')->store('images/products/', 'public');
        }

        Product::create($data);
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
        $categories = Category::all();
        return view('admin.product.edit')
            ->with('product', $product)
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

        if($request->hasFile('photo')){
            $formFields['photo'] = $request->file('photo')->store('images/products/', 'public');
        }
        
        $product->update($formFields);
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
