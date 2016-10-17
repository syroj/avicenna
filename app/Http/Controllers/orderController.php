<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\category as category;
use App\product as product;
use App\customer as customer;
use App\transaction as transaction;
use App\order as order;
use DB;
use App\Http\Requests;

class orderController extends Controller
{
    public function index(){
      $orders=order::all();
      $category=category::all();
      return view('admin.order',[
        'category'=>$category,
        'orders'=>$orders
      ]);
    }
    public function addOrder(Request $request){
      $oldCart=Session::has('cart') ? Session::get('cart') : null;
      $items=Session::get('cart')->items;
      $id_cart=str_random(10);
      if (Session::has('customer')) {
        $get=Session::get('customer');
        $customer_id=$get[0]['customer_id'];
      }else{
        $customer_id=str_random(10);
        $customer=new customer;
        $customer->customer_id=$customer_id;
        //dd($customer);
        $customer->save();
      }
    $tab_orders=[
        'id_cart'=>$id_cart,
        'date'=>date('Y-m-d'),
        'totalPrice'=>$oldCart->totalPrice,
        'totalQty'=>$oldCart->totalQty,
      ];
        foreach ($items as $item) {
        $id=$item['item']['id'];
        $order=[
        'order_id'=>$id_cart,
        'cust_id'=>$customer_id,
        'title'=>$item['item']['title'],
        'qty'=>$item['Qty'],
        'product_id'=>$id,
        'modal'=>$item['item']['modal']*$item['Qty'],
        'price'=>$item['price'],
        'laba'=>$item['price']-($item['item']['modal']*$item['Qty']),
        'status'=>'success',
        'date'=>date('Y-m-d')
      ];
        $find=product::find($id);
        $stock=$item['item']['stock'];
        $bought=$item['Qty'];
        $restock=$stock-$bought;
        $update=product::where('id',$id)->update(['stock'=>$restock]);
        order::insert($order);
        }
        $transIn=[
          'date'=>date('Y-m-d'),
          'in'=>$oldCart->totalPrice,
          'out'=>0,
          'description'=> 'penjualan '.$id_cart,
        ];
        DB::table('tab_orders')->insert($tab_orders);
        transaction::insert($transIn);
        Session::forget('cart');
        Session::forget('customer');
        return redirect('/');

    }

    public function cancel($order_id){
      $find=order::where('order_id',$order_id)->get();
      $id=$find[0]['product_id'];

      $qty= $find[0]['qty'];
      $price = $find[0]['price'];
      $findProduct=product::where('id',$id)->get();

      $stock=$findProduct[0]['stock'] + $qty;
      $update = order::where('order_id',$order_id)->update([
         'status'=>'canceled'
      ]);
      $restock=product::where('id',$id)->update([
        'stock'=>$stock
      ]);
      transaction::insert([
        'in'=>0,
        'out'=>$price,
        'date'=>date('Y-m-d'),
        'description'=>'canceling '.$order_id
      ]);
       return redirect('/orders');
    }
    public function range(Request $request){
      $orders=order::all();
      $category=category::all();
      $from=$request->start;
      $to=$request->end;
      $data=order::whereBetween('date',[$from,$to])->get();
      return view('admin.order',[
        'category'=>$category,
        'orders'=>$data
      ]);
    }
}
