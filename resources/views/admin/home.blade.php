@extends('layouts.app')
@section('content')
<div class="container">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="row">
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-2">
                  <div class="panel panel-default">
                    <div class="panel-body" id="tengah">
                      <span class="fa fa-user fa-5x"></span>
                    </div>
                    <div class="panel-footer">
                      Total Pelanggan <span class="badge pull-right">{{count($customer)}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="panel panel-default">
                    <div class="panel-body" id="tengah">
                      <span class="fa fa-book fa-5x"></span>
                    </div>
                    <div class="panel-footer">
                      Total Produk<span class="badge pull-right">{{count($books)}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="panel panel-default">
                    <div class="panel-body" id="tengah">
                      <span class="fa fa-credit-card fa-5x"></span>
                    </div>
                    <div class="panel-footer">
                      Total Transaksi <span class="badge pull-right">{{count($transaction)}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="panel panel-default">
                    <div class="panel-body" id="tengah">
                      <span class="fa fa-level-up fa-5x"></span>
                    </div>
                    <div class="panel-footer">
                      Barang Terjual <span class="badge pull-right">{{$sold}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="panel panel-default">
                    <div class="panel-body" id="tengah">
                      <span class="fa fa-ban fa-5x"></span>
                    </div>
                    <div class="panel-footer">
                      Stok Kosong <span class="badge pull-right">{{$empty}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="panel panel-default">
                    <div class="panel-body" id="tengah">
                      <span class="fa fa-bar-chart fa-5x"></span>
                    </div>
                    <div class="panel-footer">
                      Accounting <span class="badge pull-right">Pro</span>
                    </div>
                  </div>
                </div>

              </div>
            </div>
        </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="panel panel-primary">
            <div class="panel-body"id="tengah">
              <span class="fa fa-medkit fa-4x"></span><br>
              Products
            </div>
            <div class="panel-footer">
              <a href="/product" class="btn btn-success btn-sm pull-right">Go..</a>
              <p>Manage your product</p>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="panel panel-primary">
            <div class="panel-body"id="tengah">
              <span class="fa fa-tags fa-4x"></span><br>
              Category
            </div>
            <div class="panel-footer">
              <a href="/category" class="btn btn-success btn-sm pull-right">Go..</a>
              <p>Manage your product's category</p>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="panel panel-primary">
            <div class="panel-body"id="tengah">
              <span class="fa fa-truck fa-4x"></span><br>
              Distributor / Publisher
            </div>
            <div class="panel-footer">
              <a href="/affiliate" class="btn btn-success btn-sm pull-right">Go..</a>
              <p>Manage your product's Affiliate</p>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="panel panel-primary">
            <div class="panel-body"id="tengah">
              <span class="fa fa-star fa-4x" style="color:yellow;"></span><br>
              Recomended
            </div>
            <div class="panel-footer">
              <a href="/recomended" class="btn btn-success btn-sm pull-right">Go..</a>
              <p>This is your recomendation for your customers</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
        <table class="table table-striped table-bordered">
          <thead>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Disc (%)</th>
            <th>Subtotal</th>
            <th><a href="/storage" class="btn btn-xs btn-primary pull-right"><span class="fa fa-plus"></span> New..</a>Option</th>
          </thead>
          @if (count($books)>0)
          @foreach($books as $p)
          <tbody>
            <td>{{$p->title}}</td>
            <td>{{$p->category}}</td>
            <td>{{$p->price}}</td>
            <td>{{$p->disc}}</td>
            <td>{{$p->afterDisc}}</td>
            <td style="text-align:center;">
              <div class="btn-group" role="group">
                @if($p->recomended == 0)
                <a href="/rekomendasi/{{$p->id}}" class="btn btn-default btn-sm"><span class="fa fa-star"></span></a>
                @else
                <a href="/unrecomend/{{$p->id}}" class="btn btn-default btn-sm"><span class="fa fa-star" style="color:yellow"></span></a>
                @endif
                <button class="btn btn-warning btn-sm"><span class="fa fa-edit"></span></button>
                <button type="button" name="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-trash"></span>
                </button>
                <ul class="dropdown-menu">
                  <li>
                    <form class="form" action="delProduct" method="post">
                      {{csrf_field()}}
                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <input type="hidden" name="id" value="{{$p->id}}">
                      <center><button type="submit" name="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Yes, delete!</button></center>
                    </form>
                  </li>
                </ul>
              </div>
              </td>
          </tbody>
          @endforeach
          @else
          <tbody>
            <td colspan="6" id="tengah">
              Data Tidak Tersedia
            </td>
          </tbody>
          @endif
        </table>

        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <table class="table table-striped table-bordered">
            <thead>
              <th>Category</th>
              <th colspan="2">Option</th>
            </thead>
            @if(count($categories)>0)
            @foreach($categories as $cat)
            <tbody>

              <td>{{$cat->category}}</td>

              <td id="tengah">
                <div class="dropdown">
                  <a href="#" class="btn btn-warning dropdown-toggle btn-sm" data-toggle="dropdown"><span class="fa fa-edit"></span> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li>
                      <form class="form" action="editCategory" method="post">
                        {{csrf_field()}}
                        <div class="col-sm-12">
                          <input type="text" name="category" value="{{$cat->category}}" class="form-control">
                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="id" value="{{$cat->id}}">
                      </form>
                    </li>
                  </ul>
                </div>
              </td>
              <td>
                <div class="dropdown">
                  <a href="#" class="btn btn-danger dropdown-toggle btn-sm" data-toggle="dropdown"><span class="glyphicon glyphicon-trash"></span>  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li>
                      <div class="row" id="tengah">
                        <div class="col-sm-6">
                          <a href="/deleteCategory/{{$cat->id}}" class="btn btn-danger">Yes</a>
                        </div>
                        <div class="col-sm-6">
                          <a href="/catalog" class="btn btn-default">No</a>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </td>

            </tbody>
            @endforeach
            @else
            <tbody>
              <td colspan="2" id="tengah">Data Tidak Tersedia</td>
            </tbody>
            @endif
          </table>
        </div>
        <div class="col-sm-8">
          <table class="table table-bordered table-striped">
            <thead>
              <th>#</th>
              <th>IdCustomer</th>
              <th>Name</th>
              <th>Phone</th>
              <th>email</th>
              <th>Address</th>
            </thead>
            <?php $n=1; ?>
            <tbody>
              @if(count($customer)< 1)
              <tr>
                <td>Belum ada data customer</td>
              </tr>
              @else
              @foreach($customer as $customer)
              <tr>
                <td>{{$n++}}</td>
                <td>{{$customer->customer_id}}</td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->address}}</td>
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@include('layouts.footer')
@endsection
