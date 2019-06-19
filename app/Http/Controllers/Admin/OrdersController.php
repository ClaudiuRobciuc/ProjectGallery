<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\OrderModel;
use App\ShippingStatusModel;
use App\OrderStatusModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;

class OrdersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = OrderModel::orderBy('created_at', 'desc')->get();
        $orderStatus = OrderStatusModel::all()->pluck('status', 'id');
        $shippingStatus = ShippingStatusModel::all()->pluck('status', 'id');

        return view('admin.order.index',[
            'orders' => $orders,
            'orderStatus' => $orderStatus,
            'shippingStatus' => $shippingStatus,
        ]);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();

        $order = OrderModel::find($data['orderId']);

        Session::flash('success', 'Order updated Succesfully!');

        if(!$order->update($data))
        {
            Session::flash('error', 'An error occoured');
        }
        
        return redirect()->route('admin.order.index');
    }

    /**
     * Display a the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
        return view('admin.order.show', [
            
        ]);
    }
}