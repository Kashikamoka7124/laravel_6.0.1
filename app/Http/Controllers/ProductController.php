<?php

namespace App\Http\Controllers;

use App\Product;
use App\Catagory;

use Illuminate\Support\Arr;


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
        $catagory = catagory::all();
        return view('admin.product.product',compact('catagory'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = "asset/image/NoImage/noimage3.jpg";
        if($request->has('ProductImage')){
            $extention = ".".$request->ProductImage->getClientOriginalExtension();
            $name = basename($request->ProductImage->getClientOriginalName(),$extention);
            $name = $name.$extention;
            $path = $request->ProductImage->storeAs('asset/image',$name,'public');
            $imageSuccess=$request->file('ProductImage')->move(public_path('asset/image'),$request->file('ProductImage')->getClientOriginalName());

        }
        $Product = Product::create([
            'title' => $request->title,
            'description' => $request->discription,
            'price' => $request->priceOfProduct,
            'featured' => ($request->FeaturedImage)  ? true :false,
            'discount' => ($request->discountOfProduct) ? true :false,
            'discount_price' => $request->discountOfProduct,
            'thumbnail' => $path,
        ]);

        if($imageSuccess){

            $Product->catagories()->attach($request->product_catagory);
            return back()->with('message','Product has been added');
        }

        return back()->with('message', 'Product cannot be added please check');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }
    public function all()
    {
        $sProduct = Product::all();
        return view('admin.product.index',compact('sProduct'));
        
    }

    public function GetTrash()
    {
        $sProduct = Product::all();
        return view('admin.product.product',compact('sProduct'));
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $ids = arr::pluck($product->catagories, 'id');
        $eCatagory = Catagory::where('id','!=', $product->id)->get();
        return view('admin.product.product',['eproduct'=>$product, 'eCatagory' => $eCatagory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
