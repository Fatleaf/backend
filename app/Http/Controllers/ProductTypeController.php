<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function index($product_type_id)
    {
        $products = Product::where('class',$product_type_id)->get();

        // $products = ProductType::find($product_type_id)->name;

        // $products_type = ProductType::where('id',$product_type_id)->with('products')->get();

        dd($products);
        // dd($products_type);
    }

}
