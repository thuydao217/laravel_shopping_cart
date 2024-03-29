<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Stripe;
use Illuminate\Http\RedirectResponse;
use App\Models\Comment;
use App\Models\Reply;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {
        $product = product::paginate(9);
        $comment = comment::orderby('id','desc') -> get();
        $reply = reply::all();
        return view('home.userpage',compact('product','comment','reply'));
    }
    public function redirect()
    {
        $usertype=Auth::user() ->usertype;
        if($usertype == '1')
        {
            $total_product = product::all() -> count();
            $total_order = order::all() -> count();
            $total_customer = user::all() -> count();
            $order = order::all();
            $total_revenue = 0;
            foreach($order as $order)
            {
                $total_revenue = $total_revenue + $order -> price;
            }
            $total_deliver = order::where('delivery_status','=','delivered') -> get() -> count();
            $total_processing = order::where('delivery_status','=','processing') -> get() -> count();
            return view('admin.home',compact('total_product','total_order','total_customer','total_revenue','total_deliver','total_processing'));
        }
        else
        {
            $product = product::paginate(9);
            $comment = comment::orderby('id','desc') -> get();
            $reply = reply::all();
            return view('home.userpage',compact('product','comment','reply'));
        }
    }
    public function product_details($id)
    {
        $product = product::find($id);
        return view('home.product_details',compact('product'));
    }
    public function add_cart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user -> id;
            $product = product::find($id);
            $product_exist = cart::where('Product_id','=',$id) -> where('user_id','=',$userid) -> get('id') -> first();
            if($product_exist)
            {
                $cart = cart::find($product_exist) -> first();
                $quantity = $cart -> quantity;
                $cart -> quantity = $quantity + $request -> quantity;
                if($product -> discount_price != null)
                {
                    $cart -> price = $product -> discount_price * $cart -> quantity;
                }
                else
                {
                    $cart -> price = $product -> price * $cart -> quantity;
                }
                $cart -> save();
                return redirect() -> back() -> with('message','Product Added Successfully');
            }
            else
            {
                $cart = new cart;
                $cart -> name = $user -> name;
                $cart -> email = $user -> email;
                $cart -> phone = $user -> phone;
                $cart -> address = $user -> address;
                $cart -> user_id = $user -> id;

                $cart -> Product_id = $product -> id;
                $cart -> product_title = $product -> title;
                $cart -> image = $product -> image;
                if($product -> discount_price != null)
                {
                    $cart -> price = $product -> discount_price * $request -> quantity;
                }
                else
                {
                    $cart -> price = $product -> price * $request -> quantity;
                }


                $cart -> quantity = $request -> quantity;
                $cart -> save();
                Alert::success('Product Added Successfully', 'Please check your cart');
                return redirect() -> back();
            }
        }
        else
        {
            return redirect('login');
        }
    }
    public function show_cart()
    {
        if(Auth::id())
        {
            $id = Auth::user() -> id;
            $cart = cart::where('user_id', '=',$id) -> get();
            return view('home.show_cart', compact('cart'));
        }
        else
        {
            return redirect('login');
        }
    }
    public function remove_cart($id)
    {
        $cart = cart::find($id);
        $cart -> delete();
        return redirect() -> back();
    }
    public function cash_order()
    {
        $user = Auth::user();
        $userid = $user -> id;
        $data = cart::where('user_id', '=', $userid) -> get();
        foreach($data as $data)
        {
            $order = new order;
            $order -> name = $data -> name;
            $order -> email = $data -> email;
            $order -> phone = $data -> phone;
            $order -> address = $data -> address;
            $order -> user_id = $data -> user_id;
            $order -> product_title = $data -> product_title;
            $order -> quantity = $data -> quantity;
            $order -> price = $data -> price;
            $order -> image = $data -> image;
            $order -> product_id = $data -> Product_id;
            $order -> payment_status = 'cash on delivery';
            $order -> delivery_status = 'processing';
            $order -> save();

            $cardid = $data ->id;
            $cart = cart::find($cardid);
            $cart -> delete();
        }
        return redirect() -> back() -> with('message','We Have Received Your Order. We will connect you soon (^-^)');
    }
    public function stripe($totalprice)
    {
        return view('home.stripe', compact('totalprice'));
    }
    public function stripePost(Request $request, $totalprice): RedirectResponse
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for your payment"
        ]);

        $user = Auth::user();
        $userid = $user -> id;
        $data = cart::where('user_id', '=', $userid) -> get();
        foreach($data as $data)
        {
            $order = new order;
            $order -> name = $data -> name;
            $order -> email = $data -> email;
            $order -> phone = $data -> phone;
            $order -> address = $data -> address;
            $order -> user_id = $data -> user_id;
            $order -> product_title = $data -> product_title;
            $order -> quantity = $data -> quantity;
            $order -> price = $data -> price;
            $order -> image = $data -> image;
            $order -> product_id = $data -> Product_id;
            $order -> payment_status = 'Paid';
            $order -> delivery_status = 'processing';
            $order -> save();

            $cardid = $data ->id;
            $cart = cart::find($cardid);
            $cart -> delete();
        }

        return back()
                ->with('success', 'Payment successful!');
    }
    public function show_order()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user -> id;
            $order = order::where('user_id','=',$userid) -> get();
            return view('home.order',compact('order'));
        }
        else
        {
            return redirect('login');
        }

    }
    public function cancel_order($id)
    {
        $order = order::find($id);
        $order -> delivery_status = 'You Canceled the Order';
        $order ->save();
        return redirect() -> back();
    }
    public function add_comment(Request $request)
    {
        if(Auth::id())
        {
            $comment = new comment;
            $comment -> name = Auth::user() -> name;
            $comment -> user_id = Auth::user() -> id;
            $comment -> comment = $request -> comment;
            $comment -> save();
            return redirect() -> back();
        }
        else
        {
            return redirect('login');
        }
    }
    public function add_reply(Request $request)
    {
        if(Auth::id())
        {
            $reply = new reply;
            $reply -> name = Auth::user() -> name;
            $reply -> user_id = Auth::user() -> id;
            $reply -> comment_id = $request -> commentid;
            $reply -> reply =  $request -> reply;
            $reply -> save();
            return redirect() -> back();

        }
        else
        {
            return redirect('login');
        }
    }
    public function product_search(Request $request)
    {
        $comment = comment::orderby('id','desc') -> get();
        $reply = reply::all();
        $search_text = $request -> search;
        $product = product::where('title','LIKE', "%$search_text%") -> orWhere('catagory','LIKE', "$search_text") -> paginate(9);
        return view('home.userpage',compact('product','comment','reply'));
    }
    public function view_product_search(Request $request)
    {
        $comment = comment::orderby('id','desc') -> get();
        $reply = reply::all();
        $search_text = $request -> search;
        $product = product::where('title','LIKE', "%$search_text%") -> orWhere('catagory','LIKE', "$search_text") -> paginate(9);
        return view('home.all_product',compact('product','comment','reply'));
    }
    public function products()
    {
        $product = product::paginate(9);
        $comment = comment::orderby('id','desc') -> get();
        $reply = reply::all();
        return view('home.all_product',compact('product','comment','reply'));
    }
}
