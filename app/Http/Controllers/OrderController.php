<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $userId = Session::get('user_id');
        $cartItems = Cart::where('user_id', $userId)->get();

        foreach($cartItems as $item){
            Order::create([
                'user_id' => $userId,
                'name' => Session::get('user_name'),
                'address' => $request->address,
                'phone' => $request->phone,
                'method' => $request->method,
                'product_name' => $item->name,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'status' => 'pending'
            ]);
        }
        Cart::where('user_id', $userId)->delete();
        return redirect('/')->with('message', 'Order placed successfully!');
    }
}