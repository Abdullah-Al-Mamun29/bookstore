
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home() { return view('home'); }
    public function about() { return view('about'); }
    
    public function shop() {
        $products = Product::all();
        return view('shop', compact('products'));
    }

    public function contact() { return view('contact'); }

    public function sendContact(Request $request) {
        Message::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'message' => $request->message,
        ]);
        return back()->with('success', 'Message sent successfully!');
    }

    public function search() { return view('search'); }

    public function searchProduct(Request $request) {
        $query = $request->input('search');
        $products = Product::where('name', 'LIKE', "%{$query}%")->get();
        return view('search', compact('products'));
    }
}