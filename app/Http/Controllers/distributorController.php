<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\distributor as distributor;
use App\publisher as publisher;
use App\Http\Requests;
use App\category as category;

class distributorController extends Controller
{
  public function index(){
    $distributor=distributor::all();
    $publisher=publisher::all();
    $category=category::all();
    return view('admin.indexAffiliate')->with([
      'distributor'=>$distributor,
      'publisher'=>$publisher,
      'category'=>$category
    ]);
  }
  public function addPublisher(Request $request){
    $pub = new publisher;
    $pub->publisher=$request->publisher;
    $pub->email=$request->email;
    $pub->phone=$request->phone;
    $pub->address=$request->address;
    $pub->save();
    return redirect('/affiliate');
  }
  public function addDistributor(Request $request){
    $dist = new distributor;
    $dist->distributor=$request->distributor;
    $dist->email=$request->email;
    $dist->phone=$request->phone;
    $dist->address=$request->address;
    $dist->save();
    return redirect('/affiliate');
  }
}
