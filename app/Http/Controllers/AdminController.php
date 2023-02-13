<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\User;
use App\Models\Order;
use App\Models\MenuItem;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function users(){
        if(Auth::id()){
            $users = User::all();
            return view('admin.users' , compact('users'));
        }
        else{
            return redirect('login');
        }
    }

    public function delete($id){
        if(Auth::id()){

            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->back();
        }else{
            return redirect('login');
        }
    }

    public function menu(){
        if(Auth::id()){
            $items = MenuItem::all();
            return view('admin.menu' , compact('items'));
        }else{
            return redirect('login');
        }
    }

    public function store_menu(Request $request){
        if(Auth::id()){
            $item = new MenuItem();
            $item->title = $request->title;
            $item->desc = $request->desc;
            $item->price = $request->price;
            $image = $request->image;
            $image_name = time() . "." .$image->getClientOriginalExtension();
            $request->image->move("menuItems" , $image_name);
            $item->image = $image_name;
            $item->save();

            return redirect()->back();
        }else{
            return redirect('login');
        }
    }

    public function delete_item($id){
        if(Auth::id()){
           $item = MenuItem::findOrFail($id);
           $item->delete();
            return redirect()->back();
        }else{
            return redirect('login');
        }
    }

    public function edit_item($id){
        if(Auth::id()){
           $item = MenuItem::findOrFail($id);
            return view('admin.edit_item' , compact('item'));
        }else{
            return redirect('login');
        }
    }

    public function update_menu($id , Request $request){
        if(Auth::id()){
            $item = MenuItem::findOrFail($id);

            $item->title = $request->title;
            $item->desc = $request->desc;
            $item->price = $request->price;

            $image = $request->image;
            if($image != null){
            $image_name = time() . "." .$image->getClientOriginalExtension();
            $request->image->move("menuItems" , $image_name);
            $item->image = $image_name;
            }
            $item->save();
            $items = MenuItem::all();
            return view('admin.menu' , compact('items'));
        }else{
            return redirect('login');
        }
    }

    public function store_reservation(Request $request){
        if(Auth::id()){

            $item = new Reservation();

            $item->name = $request->name;
            $item->email = $request->email;
            $item->phone = $request->phone;
            $item->guest = $request->guest;
            $item->date = $request->date;
            $item->time = $request->time;
            $item->message = $request->message;

            $item->save();

            return redirect()->back();
        }else{
            return redirect('login');
        }
    }

    public function reservation(){
        if(Auth::id()){

            $items = Reservation::all();

            return view('admin.view_reservation' , compact('items'));
        }else{
            return redirect('login');
        }
    }

    public function chefs(){
        if(Auth::id()){
            $items = Chef::all();
            return view('admin.chefs' , compact('items'));
        }else{
            return redirect('login');
        }
    }

    public function create_chef(Request $request){
        if(Auth::id()){
            $chef = new Chef();
            $chef->name = $request->name;
            $chef->spec = $request->spec;
            $image = $request->image;
            $image_name = time(). "." . $image->getClientOriginalExtension();
            $request->image->move('chefs' , $image_name);
            $chef->image = $image_name;
            $chef->save();

            return redirect()->back();
        }else{
            return redirect('login');
        }
    }


    public function delete_chef($id){
        if(Auth::id()){
            $chef = Chef::find($id);
            $chef->delete();
            return redirect()->back();
        }else{
            return redirect('login');
        }
    }

    public function edit_chef($id){
        if(Auth::id()){
            $item = Chef::find($id);
            return view('admin.edit_chef' , compact('item'));
        }else{
            return redirect('login');
        }
    }

    public function update_chef($id , Request $request){
        if(Auth::id()){
            $item = Chef::find($id);
            $item->name = $request->name;
            $item->spec = $request->spec;
            $image = $request->image;
            if($image != null){
            $image_name = time(). "." . $image->getClientOriginalExtension();
            $request->image->move('chefs' , $image_name);
            $item->image = $image_name;
            }
            $item->save();
            $items = Chef::all();

            return view('admin.chefs' , compact('items'));
        }else{
            return redirect('login');
        }
    }

    public function orders(){
        $orders = Order::all();
        return view('admin.orders' , compact('orders'));
    }
}
