<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class HomeOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.orders.index', [
            'title' => 'Orders',
            'products' => Product::all(),
            'categories' => Category::all(),
            'orders' => Order::all(),
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $order_item = Product::where('id', $request->order_item)->first();

        $rules = [
            'customer_name' => 'required|String',
            'order_status' => 'required|String',
            'amount' => 'required|Integer'
        ];

        $validatedData = $request->validate($rules);

        // $validatedData['order_item'] = $request->order_item;
        $validatedData['order_item'] = $order_item['name'];
        $validatedData['customer_phone'] = $request->customer_phone;
        $validatedData['customer_email'] = $request->customer_email;
        
        $validatedData['amount'] = $request->amount;
        $validatedData['total'] = $request->total * $validatedData['amount'];

        // dd($validatedData);

        Order::create($validatedData);

        return redirect('/home/orders')->with('success', 'New order has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('home.orders.show', [
            'title' => 'Order Details',
            'orders' => Order::orderBy('id', 'desc')->get(),
            'orderShow' => $order,
            'categories' => Category::all(),
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('home.orders.edit', [
            'title' => 'Edit data order',
            'orderEdit' => $order,
            'orders' => Order::all(),
            'categories' => Category::all(),
            'users' => User::all()
        ]);
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
        
        $rules = [
            'customer_name' => 'required|String',
            'order_status' => 'required|String',
            'customer_phone' => 'String|nullable',
            'customer_email' => 'String|nullable'
        ];
        
        
        $validatedData = $request->validate($rules);

        // dd($validatedData);

        Order::where('id', $order->id)->update($validatedData);
        return redirect('/home/orders/' . $order->id)->with('success', 'Payment status changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        Order::destroy($order->id);
        return redirect('/home/orders/')->with('success', 'An order has been deleted!');
    }

    public function findProductName(Request $request){

        // get data request and query
        $data = Product::select('name', 'id')->where('category_id', $request->id)->get();

        return response()->json($data);
    }

    public function findPrice(Request $request){
        // get data request and query
        $product = Product::select('price')->where('id', $request->id)->first();

        return response()->json($product);
    }
}
