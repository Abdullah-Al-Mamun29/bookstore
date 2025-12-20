<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Category;
use App\Models\Subscriber;
use App\Models\Message;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(8)->get();
        $categories = Category::all();
        return view('index', compact('products', 'categories'));
    }

    public function home()
    {
        if (!Session::has('user_id')) {
            return redirect()->route('login');
        }
        $products = Product::all();
        $categories = Category::all();
        return view('home', compact('products', 'categories'));
    }

    public function category($id)
    {
        $categories = Category::all();
        $products = Product::where('category_id', $id)->get();
        $category = Category::find($id);
        $category_name = $category ? $category->cat_name : 'Books';

        return view('shop', compact('products', 'categories', 'category_name'));
    }

    public function shop()
    {
        if (!Session::has('user_id')) {
            return redirect()->route('login');
        }
        $products = Product::all();
        $categories = Category::all();
        return view('shop', compact('products', 'categories'));
    }

    public function addToCart(Request $request)
    {
        if (!Session::has('user_id')) {
            return redirect()->route('login');
        }

        $userId = Session::get('user_id');

        $cartItem = Cart::where('user_id', $userId)
            ->where('name', $request->name)
            ->first();

        if ($cartItem) {
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

        return back()->with('message', 'Added to cart!');
    }

    public function viewCart()
    {
        if (!Session::has('user_id')) {
            return redirect()->route('login');
        }

        $cart_items = Cart::where('user_id', Session::get('user_id'))->get();
        return view('cart', compact('cart_items'));
    }

    public function updateCart(Request $request)
    {
        Cart::where('id', $request->cart_id)
            ->where('user_id', Session::get('user_id'))
            ->update(['quantity' => $request->cart_quantity]);

        return back()->with('message', 'Cart updated successfully!');
    }

    public function deleteCartItem($id)
    {
        Cart::where('id', $id)->where('user_id', Session::get('user_id'))->delete();
        return back()->with('message', 'Item removed!');
    }

    public function emptyCart()
    {
        Cart::where('user_id', Session::get('user_id'))->delete();
        return back()->with('message', 'Cart cleared!');
    }

    public function checkout()
    {
        if (!Session::has('user_id')) {
            return redirect()->route('login');
        }

        $cart_items = Cart::where('user_id', Session::get('user_id'))->get();
        return view('checkout', compact('cart_items'));
    }

    public function placeOrder(Request $request)
    {
        $userId = Session::get('user_id');
        $cartItems = Cart::where('user_id', $userId)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('home');
        }

        foreach ($cartItems as $item) {
            Order::create([
                'user_id' => $userId,
                'name' => $request->name,
                'number' => $request->number,
                'email' => $request->email,
                'method' => $request->method,
                'address' => $request->flat . ', ' . $request->street . ', ' . $request->city . ', ' . $request->country . ' - ' . $request->pin_code,
                'total_products' => $item->name . ' (' . $item->quantity . ')',
                'total_price' => ($item->price * $item->quantity),
                'placed_on' => date('d-M-Y'),
                'payment_status' => 'pending'
            ]);
        }

        Cart::where('user_id', $userId)->delete();
        return redirect()->route('home')->with('message', 'Order placed successfully!');
    }

    public function search(Request $request)
    {
        if (!Session::has('user_id')) {
            return redirect()->route('login');
        }
        $query = $request->input('query');
        $products = collect();

        if ($query) {
            $products = Product::where('name', 'LIKE', "%{$query}%")
                ->orWhere('author', 'LIKE', "%{$query}%")
                ->get();
        }

        return view('search', compact('products'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendContact(Request $request)
    {
        Message::create([
            'user_id' => Session::get('user_id'),
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'message' => $request->message,
        ]);

        return back()->with('message', 'Message sent successfully!');
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $exists = Subscriber::where('email', $request->email)->first();

        if ($exists) {
            return back()->with('message', 'You are already subscribed!');
        }

        Subscriber::insert([
            'email' => $request->email
        ]);

        return back()->with('message', 'Thanks for subscribing!');
    }
}
