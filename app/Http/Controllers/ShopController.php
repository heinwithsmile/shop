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
        // $products = Product::query();
        $categories = Category::all();
        foreach ($categories as $key => $category) {
            $count[] = Product::where('category_id', $category->id)->count();
        }
        if (!empty($request->has('category'))) {
            $slugs = explode(',', $request->input('category'));
            $slugs = array_map('trim', $slugs);
            $slugs = array_filter($slugs);

            if (!empty($slugs)) {
                $cat_ids = Category::whereIn('name', $slugs)->pluck('id')->all();
                if (!empty($cat_ids)) {
                    $products = Product::whereIn('category_id', $cat_ids)->get();
                }
            }
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
            $products = Product::where('status', 'active')->paginate(6);
        }
        return view('pages.shop')
            ->with('products', $products)
            ->with('categories', $categories)
            ->with('cat_count', $count);
    }

    public function detail($id)
    {
        $product = DB::table('products')
            ->where('id', $id)
            ->get();
        return view('pages.detail')->with('product', $product);
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
