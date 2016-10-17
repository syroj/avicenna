@extends('layouts.app')
@section('content')
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-sm-2 pull-right" style="padding-bottom:10px;" >
                          <form class="form" action="/search" method="post">
                            {{csrf_field()}}
                            <div class="input-group">
                              <input type="hidden" name="_token" value="{{csrf_token()}}">
                              <input type="text" name="search" class="form-control" placeholder="Search...">
                              <div class="input-group-addon">
                                <span class="fa fa-search"></span>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="btn-group col-sm-5" role="group">
                          <a href="/" class="btn btn-default"><span class="fa fa-home"></span></a>
                          <a href="/recomended" class="btn btn-default"><span class="fa fa-star" style="color:yellow"></span> Recomended</a>
                          <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Category
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a href="/">All</a></li>
                              @foreach($category as $cat)
                              <li><a href="{{url('byCateg',$cat->id)}}">{{$cat->category}}</a></li>
                              @endforeach
                            </ul>
                          </div>
                        </div>
                      </div>
                      <table id="product"class="table table-bordered">
                        <thead>
                          <th>#</th>
                          <th><span class="glyphicon glyphicon-picture"></span> Img</th>
                          <th><span class="glyphicon glyphicon-list"></span> Title</th>
                          <th><span class=""></span> Stock</th>
                          <th><span class="fa fa-money"></span> Price (Rp)</th>
                          <th><span class="fa fa-cut"></span> Disc</th>
                          <th><span class="fa fa-money"></span> Paid</th>
                          <th>Option</th>
                        </thead>
                        <?php $p=1; $a=1;?>
                        <tbody>
                          @if(count($products)>0)
                          @foreach($products as $pr)
                          <tr>
                          <td>{{$p++}}</td>
                          <td>
                            <center>
                              @if($pr->photo != null)
                              <img src="/assets/img/{{$pr->photo}}" id="imgProduct" alt="" />
                              @else
                              <span class="fa fa-book fa-3x"></span>
                              @endif
                            </center>
                          </td>
                          <td>{{$pr->title}}</td>
                          <td>{{$pr->stock}}</td>
                          <td>{{$pr->price}}</td>
                          <td>{{$pr->disc}}</td>
                          <td>{{$pr->afterDisc}}</td>
                          <td id="tengah">
                            @if($pr->stock >0)
                            <a href="/add2Cart/{{$pr->id}}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-shopping-cart"></span> Beli</a>
                            @else
                            <a href="/preorder/{{$pr->id}}" class="btn btn-default btn-sm"><span class="fa fa-phone"></span> Preorder</a>
                            @endif
                          </td>
                          </tr>
                          @endforeach
                          @else
                          <tr>
                            <td colspan="8" id="tengah">
                              Data produk belum tersedia
                            </td>
                          </tr>
                          @endif
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
<div class="clearfix"></div>
@if(count($products)>4)
@include('layouts.footer')
@endif
@endsection
