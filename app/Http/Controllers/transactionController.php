<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product as product;
use App\transaction as transaction;
use App\category as category;
use App\order as order;
use DB;
use App\Http\Requests;

class transactionController extends Controller
{
  public function in(Request $request){
    $category = category::all();
    $transaction=transaction::all();
    $in=transaction::sum('in');
    $out=transaction::sum('out');
    $saldo=$in - $out;
   return view('admin.transaction',[
     'category'=>$category,
     'transaction'=>$transaction,
     'saldo'=>$saldo
   ]);
 }
 public function order(Request $request){
   $category = category::all();
   $transaction=transaction::all();
   $in=transaction::sum('in');
   $out=transaction::sum('out');
   $saldo=$in - $out;
   $from=$request->start;
   $to=$request->end;
   $data=transaction::whereBetween('date',[$from,$to])->get();
   return view('admin.transaction',[
     'category'=>$category,
     'transaction'=>$data,
     'saldo'=>$saldo
   ]);
 }
}
