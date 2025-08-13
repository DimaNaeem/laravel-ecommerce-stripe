<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Show cart
    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['qty']);
        return view('cart.index', compact('cart', 'total'));
    }

    // Add product
    public function add(Request $request, Product $product)
    {
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['qty'] += 1;
        } else {
            $cart[$product->id] = [
                'id'    => $product->id,
                'name'  => $product->name,
                'price' => (float) $product->price,
                'image' => $product->image,
                'qty'   => 1,
            ];
        }

        $request->session()->put('cart', $cart);
        return back()->with('status', 'Added to cart');
    }

    // Update quantity
    public function update(Request $request, Product $product)
    {
        $qty = max(1, (int) $request->input('qty', 1));
        $cart = $request->session()->get('cart', []);
        if (isset($cart[$product->id])) {
            $cart[$product->id]['qty'] = $qty;
            $request->session()->put('cart', $cart);
        }
        return back();
    }

    // Remove item
    public function remove(Request $request, Product $product)
    {
        $cart = $request->session()->get('cart', []);
        unset($cart[$product->id]);
        $request->session()->put('cart', $cart);
        return back();
    }

    // Clear all
    public function clear(Request $request)
    {
        $request->session()->forget('cart');
        return back();
    }
}
