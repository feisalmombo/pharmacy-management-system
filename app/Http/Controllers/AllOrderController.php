<?php

namespace App\Http\Controllers;


use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllOrderController extends Controller
{
    public function index()
    {
        $title = "Orders";
        $orders = Order::get();

        // return json_encode($orders);

        return view('allorders.orders',compact(
            'title','orders',
        ));
    }
}
