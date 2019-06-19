<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\PaintingModel;
use App\OrderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Cart;
use Session;
use DB;
use Carbon;

class PaintingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }

    /**
     * Add a product to cart instance.
     *
     * @return void
     */
    public function add(Request $request, $id)
    {
        $painting = PaintingModel::find($id);

        if(!$painting)
            abort(404); 

        $cartItem = Cart::add(['id' => $painting->refference_id, 'name' => $painting->title, 'qty' => 1, 'price' => $painting->price]);
        $cartItem->associate('App\PaintingModel');

        return redirect()->intended('/');
    }

    /**
     * Pay the products from the cart instance.
     *
     * @return void
     */
    public function pay(Request $request)
    {
        $user = Auth::user();

        if(!$user)
            abort(404);
        
        $order = new OrderModel();
        $order->user_id = $user->id;
        $order->total_price = Cart::total(2, '.', '');
        $order->save();

        foreach(Cart::content() as $product)
        {
            $painting = PaintingModel::where('refference_id', $product->id)->first();
            $painting->sold_at = Carbon\Carbon::now();
            $painting->save();
            Cart::remove($product->rowId);
        }

        Session::flash('success', 'Payment sucessfully made!');
        return redirect()->intended('/');
    }
}