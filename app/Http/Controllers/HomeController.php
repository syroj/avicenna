<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product as product;
use App\publisher as publisher;
use App\category as category;
use App\distributor as distributor;
use App\customer as customer;
use App\transaction as transaction;
use App\order as order;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $order=order::all();
      $sold=order::sum('qty');
      $books=product::all();
      $empty=product::where('stock',0)->count();
      $publishers=publisher::all();
      $categories=category::all();
      $dist=distributor::All();
      $customer=customer::all();
      $transaction=transaction::all();
      return view('admin.home')->with([
        'books'=>$books,
        'publishers'=>$publishers,
        'categories'=>$categories,
        'category'=>$categories,
        'distributor'=>$dist,
        'customer'=>$customer,
        'transaction'=>$transaction,
        'sold'=>$sold,
        'empty'=>$empty
      ]);
    }

}
