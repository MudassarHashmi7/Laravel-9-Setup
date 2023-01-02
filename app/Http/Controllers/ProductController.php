<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::query()->with('getcat')->get();
        return view('products.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::query()->with('getsubcategory')->get();
        return view('products.create',compact('categories'));
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
            'product'=>'required',
            'quantity'=>'required'
        ]);

        $products=new Product;
        $products->product=$request->product;
        $products->quantity=$request->quantity;
        $products->save();


        $categories = $request['item'];
        $products->getcat()->sync($categories);

        return redirect(route('products.index'))->with('success','Product Added Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {


        $categories=Category::query()->with('getsubcategory')->get();

        return view('products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $product)
    {
        $request->validate([
            'product'=>'required',
            'quantity'=>'required'
        ]);


        $product->product=$request->product;
        $product->quantity=$request->quantity;
        $product->update();


        $categories = $request['item'];
        $product->getcat()->sync($categories);

        return redirect(route('products.index'))->with('success','Product Added Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products=Product::findOrFail($id);
        $products->getcat()->detach();
        $products->delete();

        return redirect(route('products.index'))->with('success', 'Product has been Deleted successfully');
    }

    public function test(){
        $product=Product::all();
        dd($product);
    }
}
