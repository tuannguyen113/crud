<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::latest()->Paginate(5);
        return view('index',compact('data'))->with('i',(request()->input('page',1)-1)*5);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        ]);
        $file_name = time(). '.' .request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'),$file_name);
        $product = new Product();
        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->image=$file_name;
        $product->save();
        return redirect()->route('products.index')->with('success','Product Add Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        ]);
        $image= $request->hidden_image;
        if ($request -> image !=''){
            $image = time(). '.' .request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'),$image);
        }
        $product=Product::find($request->hidden_id);
        $product->name=$request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->image = $image;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Product Data has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product Data deleted successfully');
    }
}
