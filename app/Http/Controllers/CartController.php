<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;

class CartController extends Controller
{
    public function addProductToCar(Request $request){

        // \Cart::add(455, 'Sample Item', 100.99, 2, array());

        $product_id = $request->product_id;


        $product = Product::find($product_id);

        $user = "";
        if(auth()->user())
        {
            $userId = auth()->user()->id; // or any string represents user identifier
        }

        \Cart::session($userId)->add($product_id, $product->title, $product->price, 1, array());

        $cartTotalQuantity = \Cart::session($userId)->getTotalQuantity();
        return $cartTotalQuantity;
    }

    public function getContent()
    {
        $content = \Cart::getContent();
        dd($content);
    }

    public function getTotal()
    {
        $total = \Cart::getTotal();
        dd($total);
    }

    // public function cart()
    // {
    //     $content = \Cart::getContent()->sort(); //取得購物車產品後排序
    //     $total = \Cart::getTotal();

    //     return view("front.cart",compact('content','total'));
    // }

    // public function changeProductQty(Request $request)
    // {
    //     $product_id = $request->product_id;
    //     $new_qty = $request->new_qty;

    //     \Cart::update($product_id , array(
    //         'quantity' => array(
    //             'relative' => false,
    //             'value' => $new_qty
    //         ),
    //     ));

    //     return "suceess";
    // }
}
