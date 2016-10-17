@extends('layouts.app')
@section('content')
<div class="container">
  <div class="panel panel-default">
  <div class="clearfix">
  </div>
  <form class="form" action="addOrder" method="post">
    {{csrf_field()}}
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="panel-body">
      <div class="row">
        @if(Session::has('cart'))
        <div class="col-sm-12">
          <table class="table table-bordered">
            <thead>
              <th style="width:5%;">#</th>
              <th>Title</th>
              <th>Price</th>
              <th>Disc (%)</th>
              <th>AfterDisc</th>
              <th>Qty</th>
              <th>Subtotal</th>
              <th>Action</th>
            </thead>
            <tbody>
              <?php $i=1; ?>
              @foreach($products as $p)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$p['item']['title']}}</td>
                <td style="width:20%;">{{$p['item']['price']}}</td>
                <td>{{$p['item']['disc']}}</td>
                <td >{{$p['item']['afterDisc']}}</td>
                <td style="width:6%;" id="tengah"><input type="text"  name="qty" value="{{$p['Qty']}}" class="form-control"></td>
                <td>{{$p['price']}}</td>
                <td id="tengah">
                  <div class="btn-group" role="group">
                    <a href="/addOne/{{$p['item']['id']}}" class="btn btn-success btn-sm"><span class="fa fa-plus"></span></a>
                    <a href="/minOne/{{$p['item']['id']}}" class="btn btn-warning btn-sm"><span class="fa fa-minus"></span></a>
                    <a href="/removeItem/{{$p['item']['id']}}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                  </div>
                </td>
              </tr>
              @endforeach
              <tr>
                <td colspan="8" id="tengah">Pembayaran</td>
              </tr>
              <tr>
                @if(Session::has('customer'))
                @foreach($customer as $c)
                <td colspan="3">
                  Customer
                </td>
                <td>
                  <input type="text" name="name" class="form-control" placeholder="Nama" id="name" value="{{$c->name}}">
                </td>
                <td>
                  <input type="text" name="phone" class="form-control"  placeholder="No.Telp" id="phone" value="{{$c->phone}}">
                </td>
                <td colspan="2">
                  <input type="email" name="email" class="form-control"  placeholder="email" id="email" value="{{$c->email}}">
                </td>
                <td>
                  <input type="text" name="address" class="form-control" placeholder="alamat" id="address" value="{{$c->address}}">
                </td>
                @endforeach
                @else
                <td colspan="8">
                  Silahkan Pilih Customer atau <a href="{{url('newcustomer')}}">Customer Baru</a>
                </td>

                @endif
              </tr>
              <tr>
                <td colspan="5"></td>
                <td colspan="2"><h4><strong>Total (Rp.)</strong></h4></td>
                <td style="width:20%;"><h4><strong>{{$totalPrice}} K</strong></h4></td>
              </tr>
            </tbody>
          </table>
        </div>
        @else
        <center><span class="fa fa-shopping-bag fa-5x"></span></center>
        <h3 id="tengah">Anda Belum Memiliki Belanjaan</h3>
        <p id="tengah">
          Silahkan Kembai ke Halaman Pembelian <a href="/" class="btn btn-default btn-sm"><span class="fa fa-home"></span> Back</a>
        </p>
        @endif
      </div>
    </div>
    @if(Session::has('cart'))
    <div class="panel-footer">
      <a href="/" class="btn btn-default btn-md"><span class="fa fa-shopping-cart"></span> LanjutBelanja</a>
      <div class="pull-right">
        @if(Session::has('customer'))
        <a href="/addOrder" class="btn btn-default btn-sm"><span class="fa fa-shopping-bag"></span> Bayar</a>
        @endif
        <a href="/clearCart" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span> clear</a>
      </div>
    </div>
    @endif
  </form>
  </div>
</div>

@endsection
