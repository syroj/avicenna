<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use App\cart as cart;
use App\product as product;
use App\category as category;
use App\customer as customer;
class cartController extends Controller
{
    public function index(){
      $customer=customer::all();
      $category= category::all();
      if (!Session::has('cart')) {
        return view('admin.cart')->with(['category'=>$category]);
      }
      $oldCart=Session::get('cart');
      $customer=Session::get('customer');
      $cart=new cart($oldCart);
      $products=$cart->items;
      return view('admin.cart',[
        'products'=>$products,'totalPrice'=>$cart->totalPrice,'category'=>$category,
        'customer'=>$customer
    ]);
    }
    public function add2Cart(Request $request,$id){
      $product=product::find($id);
      $oldCart= Session::has('cart') ? Session::get('cart') : null;
      $cart = new cart($oldCart);
      $cart->add($product, $product->id);
      $request->session()->put('cart',$cart);
      return redirect('/');
    }
    public function addOne($id){
      $oldCart=Session::has('cart') ? Session::get('cart') : null;
      $cart = new cart($oldCart);
      $cart->addOne($id);
      Session::put('cart',$cart);
      return redirect('/cart');
    }
    public function minOne($id){
      $oldCart=Session::has('cart') ? Session::get('cart') : null;
      $cart = new cart($oldCart);
      $cart->minOne($id);
      if (count($cart->items)>0) {
        Session::put('cart',$cart);
      }else{
        Session::forget('cart');
      }
      return redirect('/cart');
    }
    public function removeItem($id){
      $oldCart=Session::has('cart') ? Session::get('cart') : null;
      $cart = new cart($oldCart);
      $cart->removeItem($id);
      if (count($cart->items)>0) {
        Session::put('cart',$cart);
      }else{
        Session::forget('cart');
      }
      return redirect('/cart');
    }
    public function clear(){
      Session::forget('cart');
      Session::forget('customer');

      return redirect('/cart');
    }
}
