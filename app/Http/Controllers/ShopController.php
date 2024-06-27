<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Stripe\Charge;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        if (!empty($request->has('category'))) {
            $cat_id = $request->input('category');
            $products = Product::where('category_id', $cat_id)->with('images')->get();
        }

        if (!empty($request->has('price'))) {
            $slug = trim($request->input('price'));
            if (!empty($slug) && $slug === "htl") {
                $products = Product::orderByDesc('price')->get();
            } elseif (!empty($slug) && $slug === "lth") {
                $products = Product::orderBy('price')->get();
            }
        }

        if (empty($products)) {
            $products = Product::where('status', 'active')
                ->with('images')
                ->orderBy('id', 'desc')
                ->get();
        }

        return view('pages.shop')
            ->with('products', $products)
            ->with('categories', $categories);
        // ->with('cat_count', $count);
    }

    public function detail($id)
    {
        $product = Product::where('id', $id)->with('images')->get();
        return view('pages.detail')->with('product', $product);
    }

    public function showCartTable()
    {
        $products = Product::all();
        return view('pages.cart', compact('products'));
    }

    public function addToCart($id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

        $cart = session()->get('cart');

        if (!$cart) {

            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "photo" => $product->photo
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->photo
        ];

        session()->put('cart', $cart);
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Product added to cart successfully!']);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function removeCartItem($id){
        if($id){
            $products = session('cart');
            unset($products[$id]);
            session()->put('cart', $products);
        }
        return redirect()->route('cart');
    }

    public function showPaymentForm()
    {
        return view('pages.payment');
    }

    public function processPayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            $session = \Stripe\Checkout\Session::create([
                'line_items'  => [
                    [
                        'price_data' => [
                            'currency'     => 'USD',
                            'product_data' => [
                                "name" => "testing",
                            ],
                            'unit_amount'  => 1000,
                        ],
                        'quantity'   => 1,
                    ],

                ],
                'mode'        => 'payment',
                'success_url' => route('success'),
                'cancel_url'  => route('checkout'),
            ]);

            return redirect()->route('payment.success')->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            return redirect()->route('payment.failure')->with('error', $e->getMessage());
        }
    }
}
