<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function show()
    {
        $cart = session('cart', []);
        $total = collect($cart)->sum(fn($i) => $i['price'] * $i['qty']);
        return view('checkout.index', compact('cart', 'total'));
    }

    public function create(Request $request)
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('status', 'Your cart is empty.');
        }

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // Build Stripe line items
        $lineItems = [];
        foreach ($cart as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item['name'],
                        // Stripe wants absolute URLs for images
                        'images' => [ url('images/'.$item['image']) ],
                    ],
                    'unit_amount' => (int) round($item['price'] * 100), // cents
                ],
                'quantity' => (int) $item['qty'],
            ];
        }

        $session = \Stripe\Checkout\Session::create([
            'mode' => 'payment',
            'line_items' => $lineItems,
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'  => route('cart.index'),
        ]);

        return redirect()->away($session->url);
    }

    public function success(Request $request)
    {
        // Payment completed — clear the cart
        session()->forget('cart');

        return view('checkout.success');
    }
}
