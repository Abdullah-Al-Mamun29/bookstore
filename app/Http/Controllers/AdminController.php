<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function dashboard()
    {
        if(Session::get('user_type') != 'admin'){
            return redirect('/login');
        }

        $total_products = Product::count();
        $total_orders = Order::count();
        $total_users = User::where('user_type', 'user')->count();
        
        return view('admin.dashboard', compact('total_products', 'total_orders', 'total_users'));
    }

    public function products()
    {
        if(Session::get('user_type') != 'admin'){
            return redirect('/login');
        }

        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    public function storeProduct(Request $request)
    {
        if(Session::get('user_type') != 'admin'){
            return redirect('/login');
        }

        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploaded_img'), $imageName);

        Product::create([
            'name' => $request->name,
            'author' => $request->author,
            'price' => $request->price,
            'image' => $imageName
        ]);

        return back();
    }
}