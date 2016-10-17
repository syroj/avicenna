@extends('layouts.app')
@section('content')
<div class="container">
  <table class="table table-bordered">
    <thead>
      <th>#</th>
      <th>Name</th>
      <th>Phone</th>
      <th>email</th>
      <th>Address</th>
      <th>Opsi</th>
    </thead>
    <?php $h=1; ?>
    <tbody>
      @if(count($customer) >0)
      @foreach($customer as $customer)
      <tr>
        <td>{{$h++}}</td>
        <td>{{$customer->name}}</td>
        <td>{{$customer->phone}}</td>
        <td>{{$customer->email}}</td>
        <td>{{$customer->address}}</td>
        <td id="tengah">
          <div class="btn-group">
            <a href="{{url('pilih',$customer->customer_id)}}" class="btn btn-default btn-sm">Pilih</a>
            <a href="#" class="btn btn-warning btn-sm"><span class="fa fa-edit"></span></a>
            <a href="#" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
          </div>
        </td>
      </tr>
      @endforeach
      @else
      <tr>
        <td colspan="6" id="tengah">
          Belum ada data customer. Daftar <a href="{{url('newcustomer')}}">customer baru</a>
        </td>
      </tr>
      @endif
    </tbody>
  </table>
</div>
@endsection
