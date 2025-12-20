<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function dashboard()
    {
        $user_id = Session::get('user_id');

        $total_pendings = DB::table('orders')
            ->where('user_id', $user_id)
            ->where('payment_status', 'pending')
            ->count();

        $total_completed = DB::table('orders')
            ->where('user_id', $user_id)
            ->where('payment_status', 'completed')
            ->count();

        $number_of_orders = DB::table('orders')
            ->where('user_id', $user_id)
            ->count();

        return view('user.dashboard', compact('total_pendings', 'total_completed', 'number_of_orders'));
    }

    public function orders()
    {
        $user_id = Session::get('user_id');

        $orders = DB::table('orders')
            ->where('user_id', $user_id)
            ->orderBy('id', 'desc')
            ->get();

        return view('user.orders', compact('orders'));
    }
}
