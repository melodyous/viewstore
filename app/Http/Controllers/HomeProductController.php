<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.products.index', [
            'title' => 'Products',
            'products' => Product::all(),
            'categories' => Category::all(),
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
        return view('home.products.create', [
            'title' => 'Add Products',
            'products' => Product::orderBy('id', 'desc')->get(),
            'categories' => Category::all(),
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'category_id' => 'required',
            'name' => 'required|String',
            'price' => 'required|Integer',
            'stock' => 'required|Integer',
            'image' => 'required|image|file|max:2048'
        ];


        $validatedData = $request->validate($rules);
        // store images to folder
        if( $request->file('image') ){
            $validatedData['image'] = $request->file('image')->store('product-images');
        }
        $validatedData['image'] = '/storage/' . $validatedData['image'];


        $validatedData['product_id'] = $validatedData['name'];
        $validatedData['product_id'] = strtolower($validatedData['product_id']);
        $validatedData['product_id'] = preg_replace('/[^A-Za-z0-9. -]/', '-', $validatedData['product_id']);

        // dd($validatedData);

        Product::create($validatedData);
        return redirect('/home/products/create')->with('success', 'A product has been added!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('home.products.show', [
            'title' => 'Product Details',
            'productShow' => $product,
            'products' => Product::orderBy('category_id', 'desc')->get(),
            'categories' => Category::all(),
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('home.products.edit', [
            'title' => 'Edit Product',
            'productEdit' => $product,
            'products' => Product::orderBy('id', 'desc')->get(),
            'categories' => Category::all(),
            'users' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        if($request->image){
            $rules = [
                'image' => 'image|file|max:2048'
            ];
        }

        $rules = [
            'category_id' => 'required',
            'name' => 'required|String',
            'price' => 'required|Integer',
            'stock' => 'required|Integer',
        ];

        

        $validatedData = $request->validate($rules);
        // store images to folder
        if( $request->file('image') ){
            $validatedData['image'] = $request->file('image')->store('product-images');
            $validatedData['image'] = '/storage/' . $validatedData['image'];
        }

        $validatedData['product_id'] = $validatedData['name'];
        $validatedData['product_id'] = strtolower($validatedData['product_id']);
        $validatedData['product_id'] = str_replace(' ', '-', $validatedData['product_id']);

        // dd($validatedData);

        Product::where('id', $product->id)
            ->update($validatedData);

        return redirect('/home/products/' . $product->product_id . '/edit')->with('success', 'A product has been updated!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return redirect('/home/products')->with('success', 'A product has been deleted!');
    }
}
