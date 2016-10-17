@extends('layouts.app')
@section('content')
<div class="container">
  <div class="col-sm-6 col-sm-offset-3">
    <div class="panel panel-default">
      <form class="form form-horizontal" action="{{url('newcustomer')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="panel-body">
          <div class="form-group">
            <label class="label-form col-sm-2">id</label>
            <div class="col-sm-8">
              <input type="text" name="customer_id" value="{{str_random(10)}}" class="form-control" readonly="true">
            </div>
          </div>
          <div class="form-group">
            <label class="label-form col-sm-2">Nama</label>
            <div class="col-sm-8">
              <input type="text" name="name" class="form-control" placeholder="Nama">
            </div>
          </div>
          <div class="form-group">
            <label class="label-form col-sm-2">Telp</label>
            <div class="col-sm-8">
              <input type="text" name="phone" class="form-control" placeholder="Telp">
            </div>
          </div>
          <div class="form-group">
            <label class="label-form col-sm-2">Email</label>
            <div class="col-sm-8">
              <input type="email" name="email" class="form-control" placeholder="email">
            </div>
          </div>
          <div class="form-group">
            <label class="label-form col-sm-2">Address</label>
            <div class="col-sm-8">
              <input type="text" name="address" class="form-control" placeholder="Alamat">
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <button type="submit" name="submit" class="btn btn-default">New Customer</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
