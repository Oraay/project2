<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function process(){
        return view('frontend.order.checkout');
    }

    public function checkout(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $product = Product::where('user_id', $user->id)->first();
        $product= new Product();
        $product->user_id = $user->id;
        $product->name = $request->name;
        $product->alamat = $request->alamat;
        $product->save();
        alert()->success('Thank you for booking');
        return redirect('history');
    }
}
