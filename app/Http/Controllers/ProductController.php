<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        $fields = $request->validate(
            [
                'name' => 'required|max:255',
                'description' => 'required',
                'price' => 'required'
            ]
        );

        $product = Product::create($fields);

        return $product;
    }

    public function show(Product $Product)
    {
        return $Product;
    }

    public function update(Request $request, Product $Product)
    {
        $fields = $request->validate(
            [
                'name' => 'required|max:255',
                'description' => 'required',
                'price' => 'required'
            ]
        );

        $Product->update($fields);

        return $Product;
    }

    public function destroy(Product $Product)
    {
        $Product->delete();
        return ['Message' => "Deleted successfully"];
    }
}