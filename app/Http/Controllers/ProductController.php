<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use App\Product;
 
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(2);
        return view('products.index')->with('products', $products); 
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
    public function store(ProductStoreRequest $request)

    {
        $image_path = '';

        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('products');
        }

        $product = Product::create([

        'name' => $request->name,
        'description' => $request->description,
        'image' => $image_path,
        'barcode' => $request->barcode,
        'price' => $request->price,
        'status' => $request->status
       ]);
       if (! $product){
           return redirect()->back()->with('error', 'sorry, there is problem while creating product.');
       }
       return redirect()->route('products.index')->with('success', 'succes, you product have been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ModelsProduct  $modelsProduct
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModelsProduct  $modelsProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
       
        $product = product::find($product->id);
      if(!$product)
       abort(404);
        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModelsProduct  $modelsProduct
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
    
          $product->name = $request->name;
          $product->description = $request->description;
          $product->barcode = $request->barcode;
          $product->price = $request->price;
          $product->status = $request->status;

        
        if ($request->hasFile('image')) {
             //delete old image
             if ($product->image) {
            Storage::delete($product->image);
             }
            //store image
             $image_path = $request->file('image')->store('products');
           //save database
             $product->image = $image_path;
     }
    if (!$product->save()) {
        return redirect()->back()->with('error', 'sorry, there is problem while updating product.');
    }
    return redirect()->route('products.index')->with('success', 'succes, you product have been updated.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModelsProduct  $modelsProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
       Storage::delete($product->image);
        }
        $product->delete();

        return response()->json(['success' => true ]);
    }
}
