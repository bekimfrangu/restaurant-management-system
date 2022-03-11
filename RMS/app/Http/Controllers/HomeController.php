<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\FoodChef;
use App\Models\Order;

class HomeController extends Controller
{
    public function index() {
        $data = Food::all();
        $data2 = FoodChef::all(); 
        $user_id = Auth::id();
        $count = Cart::where('user_id', $user_id)->count();
         return view('home', compact('data', 'data2', 'count'));
    }

    public function redirects() {
        $data = Food::all();
        $data2 = FoodChef::all();
        $usertype = Auth::user()->usertype;

        if($usertype == '1') {
            return view('admin.adminHome');
        } else {
            $user_id = Auth::id();
            $count = Cart::where('user_id', $user_id)->count();
            return view('home', compact('data','data2', 'count'));
        }
    }

     //Add to cart
     public function addCart(Request $request, $id) {

        if(Auth::id()) {
            $user_id = Auth::id();
            $foodid=$id;
            $quantity = $request->quantity;
             
            $cart = new Cart();

            $cart->user_id = $user_id;
            $cart->food_id = $foodid;
            $cart->quantity = $quantity;

            $cart->save();

            return redirect()->back();
        } else {
            return redirect('/login');
        }
    }

    public function showCart(Request $request, $id) {
        $count = Cart::where('user_id', $id)->count();
        $data = Cart::where('user_id', $id)->join('food', 'carts.food_id','=','food.id')->get();
        $data2 = Cart::select('*')->where('user_id','=', $id)->get();
         return view('showCart', compact('count','data','data2'));

    }

    public function remove($id) {
        $data = Cart::find($id);
        $data->delete();

        return redirect()->back();
    }


    //Confirm order
    public function orderConfirm(Request $request)
    {
        foreach($request->foodname as $key => $foodname) {
                $data = new Order;
                $data->foodname = $foodname;
                $data->price = $request->price[$key];
                $data->quantity = $request->quantity[$key];

                $data->name = $request->name;
                $data->phone = $request->phone;
                $data->address = $request->address;

                $data->save();

        }

       
            return redirect()->back()->with('successOrderConfirm', 'Your order has been confirmed. Enjoy!');

        }
    
}
