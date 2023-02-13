<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chef;
use App\Models\MenuItem;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public function index(){
        $items = MenuItem::all();
        $chefs = Chef::all();
        $userId = Auth::id();
        $count = Cart::where('user_id' , '=' , $userId)->count();
        return view('home.home' , compact('items', 'chefs' ,'count' ));
    }

    public function redirect(){
        if(Auth::user()->usertype == '0'){
        $items = MenuItem::all();
        $chefs = Chef::all();
        $userId = Auth::id();
        $count = Cart::where('user_id' , '=' , $userId)->count();
            return view('home.home' , compact('items' , 'chefs' , 'count'));
        }else{
            return view('admin.home');
        }
    }

    public function cart(Request $request ){

    $userId = Auth::id();
    $count = Cart::where('user_id' , '=' , $userId)->count();
    $items = Cart::where('user_id' , '=' , $userId)->get();
    return view('home.cart' ,compact('count' , 'items'));

    }

    public function add_cart(Request $request , $id){
        if(Auth::id()){
            $userId = Auth::id();
            $itemId = $id;
            $item_name = MenuItem::find($id)->title;
            $item_price = MenuItem::find($id)->price;

            $total_price = $item_price * $request->quantity;

            $item = new Cart();
            $item->user_id	 = $userId;
            $item->item_id = $itemId;
            $item->item_name = $item_name;
            $item->price = $total_price;
            $item->quantity = $request->quantity;
            $item->save();
            return redirect()->back();
        }else{
            return redirect('login');
        }
    }

    public function del_cart($id){
    $item = Cart::find($id);
    $item->delete();
    return redirect()->back();
    }

    public function confirm_order(Request $request){

        $userId = Auth::id();
        $items = Cart::where('user_id' , '=' ,$userId)->get();
        foreach($items as $item){
            $order = new Order();
            $order->item_name = $item->item_name;
            $order->price = $item->price;
            $order->quantity = $item->quantity;
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->save();
            $item->delete();
        }

    return redirect()->back();
    }















}
