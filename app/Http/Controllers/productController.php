<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\product as product;
use App\publisher as publisher;
use App\category as category;
use App\distributor as distributor;
use App\cart as cart;
use Session;
class productController extends Controller
{
    public function allProduct(){
      $product=product::all();
      $category=category::all();
      return view('admin.product')->with([
        'products'=>$product,
        'category'=>$category
      ]);
    }
    public function addProduct(){
      $category=category::all();
      return view('form.addProduct')->with('category',$category);
    }
    public function search(Request $request){
      $id=$request->search;
      $category=category::all();
      $result=product::where('title','like','%'.$id.'%')->get();
      return view('welcome')->with([
        'products'=>$result,
        'category'=>$category
      ]);
    }
    public function saveProduct(Request $request){
      $product=new product;
      if ($request->file('photo')!=null) {
        $gambar=$request->file('photo');
        $filename=$gambar->getClientOriginalName();
        $request->file('photo')->move('assets/img/',$filename);
        $product->photo = $filename;
      }
      $product->title = $request->title;
      $product->category = $request->category;
      $product->price = $request->price;
      $product->modal =$request->modal;
      $product->disc =$request->disc;
      $product->stock =$request->stock;
      $product->afterDisc= $request->price - ($request->price*($request->disc/100));
      $product->point=0;
      $product->recomended=0;
      $product->save();
      return redirect('/');
    }
    public function recomended(){
      $rec=product::where('recomended','1')->get();
      return view('welcome')->with([
        'products'=>$rec,
        'category'=>category::all(),
      ]);
    }
    public function deleteProduct(Request $request){
      $id=$request->id;
      $book=product::find($id);
      if (!is_null($book->photo)) {
        $file='assets/img/'.$book->photo;
        if (file_exists($file)) unlink($file);
      }
      $book->delete();
      return redirect('/dashboard');
    }

    public function filter($id){
      $get=product::where('category',$id)->get();
      $cat=category::all();
      return view('welcome')->with(['products'=>$get,'category'=>$cat]);
    }
    //publisher
    public function newPublisher(Request $request){
      $publisher=new publisher;
      $publisher->publisher =$request->publisher;
      $publisher->save();
      return redirect('/catalog');
    }
    //category
    public function newCategory(Request $request){
      $category=new category;
      $category->category = $request->category;
      $category->save();
      return redirect('/catalog');
    }
    public function addRecomendation($id){
      $cari=product::find($id);
      $save=product::where('id',$id)->update(['recomended'=>1]);
      return redirect('/dashboard');
    }
    public function unrecomend($id){
      $cari=product::find($id);
      $save=product::where('id',$id)->update(['recomended'=>0]);
      return redirect('/dashboard');
    }
    public function empty(Request $request){
      $category=category::all();
      $products=product::where('stock',0)->get();
      return view('admin.product',[
        'category'=>$category,
        'products'=>$products
      ]);
    }
    public function editproduct($id){
      $category=category::get();
      $product=product::where('id',$id)->get();
      return view('form.edit-product',[
        'category'=>$category,
        'product'=>$product
      ]);
    }
    /*public function saveEdit(Request $request){
      $id=$request->id;
      $find=product::find($id);
      dd($find);
      if (!is_null($find->photo)) {
        $file='assets/img/'.$find->photo;
        if (file_exists($file)) unlink($file);
      }
      if ($request->photo != null) {
        $gambar=$request->file('photo');
        $photo=$gambar->getClientOriginalName();
        $request->file('photo')->move('assets/img/',$photo);
      }else{
        $photo=null;
      }
      $data=[
        'title'=>$request->title,
        'option'=>$request->option,
        'photo'=>$photo
      ];
      product::where('id',$id)->update($data);
      return redirect('/product');
    }*/
}
