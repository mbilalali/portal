<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class EcomController extends Controller
{
//    public function productPage($id){
//        $product = Product::find($id);
//        if (!$product){ return abort('404');exit(); }
//
//        return view('website.productPage',compact('product'));
//
//    }
    public function addToCart(Request $request){

        $product = Post::find($request->product_id);
        if (!$product){return abort(404);}
//        dd($product);
        $price = $product->price;

        $data = array(
            'id'=>$request->product_id,
            'product_id'=>$request->product_id,
            'name'=>$product->title,
            'img'=>$product->image,
            'qty'=>$request->qty,
            'price'=>$price,
            'subTotal'=>$price*$request->qty,
        );
        return $this->addToCartSession($product->id,$data);

    }
    public function addToCartSession($id,$product)
    {
        $cart = session()->get('cart');

        // IF Cart is empty Add First Product
        if (!$cart) {

            $cart = [
                $id => [
                    'data'=>$product
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // update cart
        if(isset($cart[$id])) {
//            unset($cart[$id]);
            $cart[$id] = ['data'=>$product];

//            $cartTwo[$id] = ['data'=>$product];
//            array_push($cart,$cartTwo);


//            $cart = [
//                $id => [
//                    'data'=>$product
//                ]
//            ];

            session()->put('cart', $cart);
            return redirect()->back()->with('message', 'Course successfully added!');
        }

        $cart[$id] =[
            'data'=>$product
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');

    }

    public function cart(){
        return view('website.cart');
    }
}
