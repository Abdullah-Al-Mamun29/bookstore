<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    public function home()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }

    public function addToCart(Request $request)
    {
        if(!Session::has('user_id')){
            return redirect('/login');
        }

        $userId = Session::get('user_id');

        $cartItem = Cart::where('user_id', $userId)
                        ->where('name', $request->name)
                        ->first();

        if($cartItem){
            $cartItem->increment('quantity', $request->quantity);
        } else {
            Cart::create([
                'user_id' => $userId,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'image' => $request->image,
            ]);
        }

        return back()->with('message', 'Added to cart');
    }

    public function cart()
    {
        if(!Session::has('user_id')){
            return redirect('/login');
        }

        $cart_items = Cart::where('user_id', Session::get('user_id'))->get();
        return view('cart', compact('cart_items'));
    }

    public function deleteCart($id)
    {
        Cart::find($id)->delete();
        return back();
    }
}