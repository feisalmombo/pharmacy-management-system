<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Orders";
        $orders = Order::get();

        // return json_encode($orders);

        return view('orders',compact(
            'title','orders',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title= "Add Order";

        return view('add-order');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required|max:200',
            'quantity' => 'required|integer|min:1',
        ]);

        Order::create([
            'name' => $request->name,
            'quantity' => $request->quantity,
            // 'status' => 'Pending',
            'user_id' => Auth::id()
        ]);

        $notification =array(
            'message'=>'Order placed successfully!',
            'alert-type'=>'success'
        );

        return redirect()->route('orders')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $title = "Edit Order";
        $order = Order::find($id);

        return view('edit-order',compact(
            'title','order'
        ));
    }

    public function update(Request $request, Order $order)
    {
        $this->validate($request,[
            'name'=>'required|max:200',
            'quantity'=>'required',
        ]);

        $order->update([
                'name'=>$request->name,
                'quantity'=>$request->quantity,
            ]);

        $notification=array(
            'message'=>"Order has been updated has been updated",
            'alert-type'=>'success',
        );

        return redirect()->route('orders')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $order = Order::find($request->id);
        $order->delete();

        $notification=array(
            'message'=>"Order has been deleted",
            'alert-type'=>'success',
        );

        return back()->with($notification);
    }
}
