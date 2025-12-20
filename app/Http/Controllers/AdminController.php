<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (Session::get('user_type') != 'admin') {
            return redirect('/login');
        }

        $total_pendings = Order::where('payment_status', 'pending')->sum('total_price');
        $total_completed = Order::where('payment_status', 'completed')->sum('total_price');
        $number_of_orders = Order::count();
        $number_of_products = Product::count();
        $number_of_users = User::where('user_type', 'user')->count();
        $number_of_admins = User::where('user_type', 'admin')->count();
        $number_of_account = User::count();
        $number_of_messages = DB::table('messages')->count();

        return view('admin.dashboard', compact(
            'total_pendings',
            'total_completed',
            'number_of_orders',
            'number_of_products',
            'number_of_users',
            'number_of_admins',
            'number_of_account',
            'number_of_messages'
        ));
    }

    public function products()
    {
        if (Session::get('user_type') != 'admin') {
            return redirect('/login');
        }

        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    public function storeProduct(Request $request)
    {
        if (Session::get('user_type') != 'admin') {
            return redirect('/login');
        }

        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploaded_img'), $imageName);

        Product::create([
            'name' => $request->name,
            'author' => $request->author,
            'category' => $request->category,
            'price' => $request->price,
            'image' => $imageName
        ]);

        return back()->with('messages', ['Product added successfully!']);
    }

    public function updateProduct(Request $request, $id)
    {
        if (Session::get('user_type') != 'admin') {
            return redirect('/login');
        }

        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);

        $updateData = [
            'name' => $request->name,
            'author' => $request->author,
            'category' => $request->category,
            'price' => $request->price,
        ];

        if ($request->hasFile('image')) {
            if (file_exists(public_path('uploaded_img/' . $product->image))) {
                unlink(public_path('uploaded_img/' . $product->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploaded_img'), $imageName);
            $updateData['image'] = $imageName;
        }

        $product->update($updateData);

        return back()->with('messages', ['Product updated successfully!']);
    }

    public function deleteProduct($id)
    {
        if (Session::get('user_type') != 'admin') {
            return redirect('/login');
        }

        $product = Product::findOrFail($id);
        if (file_exists(public_path('uploaded_img/' . $product->image))) {
            unlink(public_path('uploaded_img/' . $product->image));
        }
        $product->delete();

        return back()->with('messages', ['Product deleted successfully!']);
    }

    public function categories()
    {
        if (Session::get('user_type') != 'admin') {
            return redirect('/login');
        }

        $categories = DB::table('categories')->get();
        return view('admin.categories', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        if (Session::get('user_type') != 'admin') {
            return redirect('/login');
        }

        $request->validate([
            'name' => 'required',
            'icon' => 'required',
        ]);

        $exists = DB::table('categories')->where('cat_name', $request->name)->exists();

        if ($exists) {
            return back()->with('messages', ['Category name already added']);
        }

        DB::table('categories')->insert([
            'cat_name' => $request->name,
            'cat_icon' => $request->icon
        ]);

        return back()->with('messages', ['Category added successfully!']);
    }

    public function deleteCategory($id)
    {
        if (Session::get('user_type') != 'admin') {
            return redirect('/login');
        }

        DB::table('categories')->where('id', $id)->delete();
        return back()->with('messages', ['Category deleted successfully!']);
    }

    public function users()
    {
        if (Session::get('user_type') != 'admin') {
            return redirect('/login');
        }

        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function deleteUser($id)
    {
        if (Session::get('user_type') != 'admin') {
            return redirect('/login');
        }

        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('messages', ['User deleted successfully!']);
    }

    public function messages()
    {
        if (Session::get('user_type') != 'admin') {
            return redirect('/login');
        }

        $messages = DB::table('messages')->get();
        return view('admin.messages', compact('messages'));
    }

    public function deleteMessage($id)
    {
        if (Session::get('user_type') != 'admin') {
            return redirect('/login');
        }

        DB::table('messages')->where('id', $id)->delete();
        return back()->with('messages', ['Message deleted successfully!']);
    }

    public function reviews()
    {
        if (Session::get('user_type') != 'admin') {
            return redirect('/login');
        }

        $reviews = DB::table('review')->get();
        return view('admin.reviews', compact('reviews'));
    }

    public function deleteReview($id)
    {
        if (Session::get('user_type') != 'admin') {
            return redirect('/login');
        }

        DB::table('review')->where('id', $id)->delete();
        return back()->with('messages', ['Review deleted successfully!']);
    }

    public function orders()
    {
        if (Session::get('user_type') != 'admin') {
            return redirect('/login');
        }

        $orders = Order::all();
        return view('admin.orders', compact('orders'));
    }

    public function updateOrder(Request $request)
    {
        if (Session::get('user_type') != 'admin') {
            return redirect('/login');
        }

        Order::where('id', $request->order_id)->update([
            'payment_status' => $request->update_payment
        ]);

        return back()->with('messages', ['Order status updated successfully!']);
    }

    public function deleteOrder($id)
    {
        if (Session::get('user_type') != 'admin') {
            return redirect('/login');
        }

        Order::findOrFail($id)->delete();
        return back()->with('messages', ['Order deleted successfully!']);
    }
}
