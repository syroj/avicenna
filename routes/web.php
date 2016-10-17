<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/',function(){
  if(Auth::check()){
    $products=App\product::all();
    $category=App\category::All();
    return view('welcome')->with([
      'products'=>$products,
      'category'=>$category
    ]);
  }else {
  return redirect ('/login');
  }
});
Auth::routes();
Route::get('/home',function(){
  return redirect('/');
});
Route::get('/recomended','productController@recomended');
Route::get('/cart','cartController@index');
Route::post('/search','productController@search');
Route::get('/dashboard', 'HomeController@index');
Route::get('byCateg/{id}','productController@filter');
// catalog
Route::get('/catalog','productController@catalog');
//product
Route::get('/storage','productController@addProduct');
Route::post('/saveProduct','productController@saveProduct');
Route::post('/delProduct','productController@deleteProduct');
Route::get('/product','productController@allProduct');
Route::get('/rekomendasi/{id}','productController@addRecomendation');
Route::get('/unrecomend/{id}','productController@unrecomend');
Route::get('empty','productController@empty');
Route::get('preorder','productController@preorder');
//Route::get('edit-product/{id}','productController@editproduct');
//Route::post('save-edit','productController@saveEdit');

//category
Route::get('/category','categoryController@index');
Route::post('/addCategory','categoryController@add');
Route::post('/editCategory','categoryController@edit');
Route::get('deleteCategory/{id}','categoryController@delete');
//distributor-publisher
Route::get('/affiliate','distributorController@index');
Route::post('/addPublisher','distributorController@addPublisher');
Route::post('/addDistributor','distributorController@addDistributor');
//Cart
Route::get('/add2Cart/{id}','cartController@add2Cart');
Route::get('/cart','cartController@index');
Route::get('/clearCart','cartController@clear');
Route::get('/minOne/{id}','cartController@minOne');
Route::get('/addOne/{id}','cartController@addOne');
Route::get('/removeItem/{id}','cartController@removeItem');
//transaction
Route::get('/transIn','transactionController@in');
Route::get('/cancelTrans/{id}','orderController@cancel');
Route::get('/TransByRange','transactionController@order');
//order
Route::get('/orders','orderController@index');
Route::get('/addOrder','orderController@addOrder');
Route::get('OrdByRange','orderController@range');
//customer
Route::get('/customer','customerController@index');
Route::get('newcustomer','customerController@new');
Route::post('newcustomer','customerController@addNew');
Route::get('sCustomer','customerController@search');
Route::get('pilih/{id}','customerController@pilih');
