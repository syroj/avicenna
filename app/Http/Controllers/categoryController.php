<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category as category;
use App\Http\Requests;

class categoryController extends Controller
{
  public function index(){
    $category=category::All();
    return view('admin.indexCategory')->with([
      'category'=>$category
    ]);
  }
  public function add(Request $request){
    $category=new category;
    $category->category=$request->category;
    if ($request->category!=null) {
      $category->save();
      return redirect('/category');
    }
    return redirect('/category');
    
  }
  public function edit(Request $request){
    $id=$request->id;
    $data=[
      'category'=>$request->category
    ];
    $simpan=category::where('id',$id)->update($data);
    return redirect('/category');
  }
  public function delete($id){
    category::where('id',$id)->delete($id);
    return redirect('/category');
  }
}
