<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function showAllProducts()
    {
        return response()->json(Product::all());
    }

    public function showOneProduct($id)
    {
        return response()->json(Product::find($id));
    }

    public function createProduct(Request $request)
    {
        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

    public function updateProduct($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return response()->json($product, 200);
    }

    public function deleteProduct($id)
    {
        Product::findOrFail($id)->delete();
        return response()->json('Product deleted', 200);
    }
}
