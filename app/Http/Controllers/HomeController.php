<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    private $cart;
    public function redirect()
    { $userType =Auth::user()->user_type;
        if ($userType == 1)
        {
            return view('admin.home');
        }
        else{
            return view('front.index',[
                'products'=>Product::latest()->paginate(3)
            ]);
        }

    }
    public function index()
    {
        return view('front.index',[
            'products'=>Product::latest()->paginate(3)
        ]);
    }
    public function productDetails($id)
    {

        return view('front.product-detail',[
            'product'=>Product::find($id)
        ]);
    }
    public function addToCart(Request $request,$id)
    {
        if (Auth::check())
        {

            Cart::addCart($request,$id);
            return redirect()->back()->with('success','your product added to cart successfully');

        }
        else
        {
            return redirect('login');
        }

    }
    public function showCart()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
            return view('front.show-cart',[
                'carts'=>Cart::where('user_id', $id)->get(),

            ]);
        }
        else{
            return redirect('login');
        }

    }
    public function deleteCart($id)
    {
       $this->cart = Cart::find($id);
       $this->cart->delete();
       return redirect()->back()->with('success','cart deleted successfully');

    }
    public function cashOrder()
    {
        $user = Auth::user();
        $userId = $user->id;
        $datas = Cart::where('user_id',$userId)->get();
        Order::createOrder($datas);
        return redirect('/show-cart')->with('success','We received your order,we will contact with you soon');

    }

}
