<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
{
   return Product::all();
}

public function store(Request $request, Product $product)
{
    $validate = $request->validate([
        'name' => $request->input('name'),
        'price' => $request->input('price'),
        'stock' => $request->input('stock'),
    ]);

    $product=Product::create($validate);
    if($product){
        return response()->json([
            'data' => new Product($product)
        ], 201);
}
}

public function update(Request $request,$id)
{

    $product=Product::find($id);
    if($product){
        $name = $request->input('name');
        $price = $request->input('price');
        $stock = $request->input('stock');
    }
        $product=Product::update([
            'name' => $name,
            'price' => $price,
            'stock' => $stock,
        ]);
        return response()->json([
            'data' => new Product()
        ], 200);
}

public function destroy(Product $product,$id)
{
  $product=Product::find($id);
   if($product){
    $product->delete();
    
    return response()->json('The proudct is deleted',204);

}
   return response()->json(null,204);
}

}
