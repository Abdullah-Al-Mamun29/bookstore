<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        if (!Session::has('user_id')) {
            return redirect()->route('login');
        }

        $userId = Session::get('user_id');
        $cartItems = Cart::where('user_id', $userId)->get();

        return view('cart', compact('cartItems'));
    }

    public function store(Request $request)
    {
        if (!Session::has('user_id')) {
            return redirect()->route('login');
        }

        $userId = Session::get('user_id');

        $cartItem = Cart::where('user_id', $userId)
                        ->where('name', $request->name)
                        ->first();

        if ($cartItem) {
            $cartItem->increment('quantity', $request->quantity ?? 1);
            return redirect()->back()->with('success', 'Cart updated successfully!');
        }

        Cart::create([
            'user_id' => $userId,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity ?? 1,
            'image' => $request->image,
        ]);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        $cartItem = Cart::find($request->cart_id);
        
        if ($cartItem) {
            $cartItem->update([
                'quantity' => $request->cart_quantity
            ]);
            return redirect()->back()->with('success', 'Cart updated successfully!');
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        $cartItem = Cart::find($id);
        
        if ($cartItem) {
            $cartItem->delete();
            return redirect()->back()->with('success', 'Item removed from cart!');
        }

        return redirect()->back();
    }

    public function clear()
    {
        $userId = Session::get('user_id');
        Cart::where('user_id', $userId)->delete();

        return redirect()->back()->with('success', 'Cart cleared successfully!');
    }
}