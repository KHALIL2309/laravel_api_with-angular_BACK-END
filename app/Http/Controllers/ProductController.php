<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; /////////////////////////

class ProductController extends Controller
{
    //
    public function getProduct(){
        return response()->json(Product::all(), 200);
    }

    public function getProductById($id){
        $product = Product::find($id);
        if(is_null($product)){
            return response()->json(['message'=>'produit introvable!!'],404);
        }
        return response()->json(Product::find($id), 200);
    }

    public function addProduct(Request $request){
        $product = Product::create($request->all());
        return response($product,201);
    }


    public function updateProduct(Request $request , $id){
        $product = Product::find($id);
        if(is_null($product)){
            return response()->json(['message' => 'produit introuvable!!'], 404);
        }
        $product->update($request->all());
        return response($product,200);
    }

    public function deleteProduct(Request $request , $id){
        $product = Product::find($id);
        if(is_null($product)){
            return response()->json(['message' => 'produit introuvable!!'], 404);
        }
        $product->delete();
        return response(null,204);
    }


}
