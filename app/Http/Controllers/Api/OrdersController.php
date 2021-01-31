<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function show(Order $order){
        // get order with services here
        //$order->with('order_services')->first();
        return response()->json(['order'=>$order], '200');
    }

    public function update(Request $request,Order $order){
        $request->validate([
            'status' => 'in:'. implode(',',  Order::$Status)
        ]);
        $status = $request->input('status');
        if($order->transitionAllowed($status)){
            $order->transition($status);
            try {
                $order->transition($status);
            } catch(\Exception $e) {
                abort(500, $e->getMessage());
            }
        }else{
            return response()->json(['message'=> 'error'], 400);
        }

//        $order->update([
//            'init_price' => $request->input('init_price')
//        ]);

        return response()->json($order,  '200');
    }
}
