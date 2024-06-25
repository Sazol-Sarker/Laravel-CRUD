<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Products;
class ProductController extends Controller
{
    public function index()
    {
        $products=Products::all();
        return view('products.index',['products'=>$products]);
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        $data=$request->validate([
           'name' => 'required|string|max:255',
        'qty' => 'required|numeric|min:0',
        'price' => 'required|numeric|min:0',
        'description' => 'required|string|max:255'
        ]);

        \Log::info('Validated data:', $data);
        $newProduct= Products::create($data);

        // Log the created product for debugging
        \Log::info('New product created:', $newProduct->toArray());

        return redirect(route('products.index'));
    }
    public function edit(Products $product)
    {
        // dd($product);
        return view('products.edit',['product'=>$product]);
    }
    public function update(Products $product, Request $request)
    {
        $data=$request->validate([
            'name' => 'required|string|max:255',
         'qty' => 'required|numeric|min:0',
         'price' => 'required|numeric|min:0',
         'description' => 'required|string|max:255'
         ]);
         $product->update($data);
        return redirect (route('products.index'))->with('success','product update success!');
    }
    public function destroy(Products $product)
    {
        $product->delete();
        return redirect (route('products.index'))->with('DelSuccess','product deletion success!');
    }
}
