<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CommissionController;
use App\Models\Commission;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()){
            return redirect()->route('login');
        }else{
            $user_orders=Order::where('user_id',Auth::user()->id)->get();
        }
        return view('orders.create', ['user_orders' => $user_orders]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order=$request->all();
        $order['user_id']=Auth::user()->id;
        $massge = '';
        $op = Order::create($order);
        $order_commission = new Commission;
        $order_commission->user_id=$order['user_id'];
        $order_id=Order::latest()->first();
        $order_commission->order_id = $order_id->id;
        $orders_count=Auth::user()->orders;
        if((Auth::user()->account_type)=='normal'){
            if(count($orders_count) == 1){
                $order_commission['commission_value']=($order['order_price'] * $order['order_amount']) * (5/100) ;
            }else{
                $order_commission->commission_value=($order['order_price'] * $order['order_amount']) * (8/100) ;
            }
        }else{
            if(count($orders_count) == 1){
                $order_commission['commission_value']=($order['order_price'] * $order['order_amount']) * (10/100) ;
            }else{
                $order_commission->commission_value=($order['order_price'] * $order['order_amount']) * (20/100) ;
            }

        }
       
        $order_commission->save();
        if ($op) {
            $massge = 'youer order register sucsesfully';
            session()->flash('massege', $massge);
            return redirect()->route('home');
        } else {
            echo "error";
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
