<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'asc')->paginate(8);

        return view('products.index')->with('productsView', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prepareProduct = [
            'name' => $request->name,
            'details' => $request->details,
            'image' => $request->image,
            'price' => $request->price,
            'user_id' => Auth::id()
        ];

        $product = Product::create($prepareProduct);

        return redirect()->route('products.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit')->with('product', $product);
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
        $prepareProduct = [
            'name' => $request->name,
            'details' => $request->details,
            'image' => $request->image,
            'price' => $request->price,
            'user_id' => Auth::id()
        ];

        $productInst = Product::find($product->id);
        $productInst->update($prepareProduct);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $productInst = Product::find($product->id);
        $productInst->delete();

        return redirect()->route('products.index');
    }
}
