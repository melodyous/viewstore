<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
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
            'categories' => Category::all()
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
            'image' => 'image|file|max:2048'
        ];

        

        $validatedData = $request->validate($rules);
        // store images to folder
        if( $request->file('image') ){
            $validatedData['image'] = $request->file('image')->store('product-images');
        }

        $validatedData['image'] = '/storage/' . $validatedData['image'];

        $validatedData['product_id'] = $validatedData['name'];
        $validatedData['product_id'] = strtolower($validatedData['product_id']);
        $validatedData['product_id'] = str_replace(' ', '-', $validatedData['product_id']);

        // dd($validatedData);

        Product::create($validatedData);
        return redirect('/home/products/create');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        dd($product);
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
            'categories' => Category::all()
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

        if($request->image != NULL){
            $rules = [
                'image' => 'image|file|max:2048'
            ];

            $request['image'] = "/storage/" . $request['image'];
        }

        if($request->name != $product->name){
            $rules = [
                'product_id' => 'required|unique:products'
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
        }

        $validatedData['product_id'] = $validatedData['name'];
        $validatedData['product_id'] = strtolower($validatedData['product_id']);
        $validatedData['product_id'] = str_replace(' ', '-', $validatedData['product_id']);

        dd($validatedData);


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
        return redirect('/home/products');
    }
}
