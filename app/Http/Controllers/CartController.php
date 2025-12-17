<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userId = Auth::id();

        $cartItem = Cart::where('user_id', $userId)
                        ->where('name', $request->name)
                        ->first();

        if ($cartItem) {
            return redirect()->back()->with('message', 'Already added to cart!');
        }

        Cart::create([
            'user_id' => $userId,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $request->image,
        ]);

        return redirect()->back()->with('message', 'Product added to cart successfully!');
    }
}