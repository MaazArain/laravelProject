<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;

class HomeController extends Controller
{
    public function index()
    {
       if(Auth::id()){
        $usertype = Auth::user()->usertype;
        if($usertype == '0'){
            return view('dashboard');
        }
        else{
            return view('include.home');
        }
       }
    }
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if($usertype == '1')
        {
            return view('admin.home');
        }
        else{
        $product = Products::paginate(2);
        return view('website.userpage' , compact('product'));
        }
    }
    public function userpage()
    {
        $product = Products::paginate(3);
        return view('website.userpage' , compact('product'));
    }
     public function productDetails($id)
     {
        $product = Products::find($id);
         return view('website.product_details' , compact('product'));
    }
    public function addToCart(Request $request, $id)
    {

            
        if(Auth::id())
        {
            $user = Auth::user();
            $userId = $user->id;
            $product = Products::find($id);
            $cart = new Cart();
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;
            $cart->product_title = $product->title;
            $cart->price = $product->price;       
            $cart->discount_price = $product->discount_price;
            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect()->back()->with('success' , 'Product Has Been Added!');
        }
        else {
            return redirect('login');
        }
    }

    static  function getCartItem()
    {
      if(Auth::id())
      {
        $user = auth()->user();
        $count = Cart::where('user_id' , $user->id)->count();  
        return $count;
      }
    
    }

    public function showCart()
    {
        if(Auth::check()){
            $user = Auth::user();
            $cart = Cart::where('user_id' , $user->id)->get();
                $subTotal = 0;
            foreach($cart as $car){
                $subTotal += $car->price * $car->quantity; 
            }
            return view('website.show_cart' , compact('cart' , 'subTotal'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function deleteCart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        return redirect()->back()->with('delete' , 'Cart Product Has Been deleted!');
        
    }


    public function cashOrder()
    {
        $user = Auth::user();
        $userId = $user->id;
        $cartData = Cart::where('user_id' , '=' , $userId)->get();

        foreach($cartData as $cart)
        {
            $order = new Order();
            $order->name = $cart->name;
            $order->email = $cart->email;
            $order->phone = $cart->phone;
            $order->address = $cart->address;
            $order->user_id = $cart->user_id;
            $order->product_title = $cart->product_title;
            $order->price = $cart->price;
            $order->quantity = $cart->quantity;
            $order->image = $cart->image;
            $order->product_id = $cart->product_id;
            $order->payment_status = 'Cash On Delivery!';
            $order->delivery_status = 'Processing';
            $order->save();
                $cart_id = $cart->id;
                $cartFind = Cart::find($cart_id);
                $cartFind->delete();
        }
        return redirect()->back()->with('success' , 'We Reciever In the Order. We Will Connect with You Soon!');

    }


    public function stripe(Request $request)
    {
        $subTotal = 12345;
        if($request->isMethod('GET'))
        {
        return view('website.stripe' , compact('subTotal'));
        }
        elseif($request->isMethod('POST')){

            Stripe::setApiKey(config('services.stripe.secret'));
            Charge::create ([
                    "amount" => $subTotal * 100,
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "Thanks For Payment!" 
            ]);
        Session::flash('success', 'Payment successful!');
        return back();
        }
    }
    public function stripePost(Request $request)
    {
        // $subTotal = 12345;
        // if($request->isMethod('GET'))
        // {
        // return view('website.stripe' , compact('subTotal'));
        // }
        // elseif($request->isMethod('POST')){

        //     Stripe::setApiKey(config('services.stripe.secret'));
        //     Charge::create ([
        //             "amount" => $subTotal * 100,
        //             "currency" => "usd",
        //             "source" => $request->stripeToken,
        //             "description" => "Thanks For Payment!" 
        //     ]);
        // Session::flash('success', 'Payment successful!');
        // return back();
        // }
    }
}
