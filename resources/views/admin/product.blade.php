@extends('layouts.app')
@section('content')
<div class="container-fluid">
<div class="panel panel-default">
  <div class="panel-body">
    <table class="table table-bordered">
      <?php $p=1; ?>
      <thead>
        <th>#</th>
        <th>Title</th>
        <th style="width:5%;">id_category</th>
        <th>Price</th>
        <th>Modal</th>
        <th>Disc</th>
        <th>AfterDisc</th>
        <th>Stock</th>
        <th>Point</th>
        <th>Option</th>
      </thead>
      <tbody>
        @if(count($products)>0)
        @foreach($products as $pr)
        <tr>
          <td>{{$p++}}</td>
          <td>{{$pr->title}}</td>
          <td id="tengah">{{$pr->category}}</td>
          <td>{{$pr->price}}</td>
          <td>{{$pr->modal}}</td>
          <td>{{$pr->disc}}</td>
          <td>{{$pr->afterDisc}}</td>
          <td>{{$pr->stock}}</td>
          <td>{{$pr->point}}</td>
          <td id="tengah">
            <div class="btn-group">
              @if($pr->recomended ==0)
              <a href="{{url('rekomendasi',$pr->id)}}" class="btn btn-default btn-sm"><span class="fa fa-star"></span></a>
              @else
              <a href="{{url('unrecomend',$pr->id)}}" class="btn btn-default btn-sm"><span class="fa fa-star" style="color:yellow;"></span></a>
              @endif
              <a href="{{url('edit-product',$pr->id)}}" class="btn btn-default btn-sm"><span class="fa fa-edit"></span></a>
              <a href="#" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" id="edit">
                <span class="fa fa-gear"></span>
              </a>
              <ul class="dropdown-menu" >
                <li><a href="#">Discount</a></li>
                <li><a href="#">Price</a></li>
                <li><a href="#">Stock</a></li>
                <li role="separator" class="divider"></li>
                <li>
                  <form class="form" action="delProduct" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="id" value="{{$pr->id}}">
                    <center><button type="submit" name="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Yes, delete!</button></center>
                  </form>
                </li>
              </ul>
            </div>
          </td>
        </tr>
        @endforeach
        @else
        <tr>
          <td colspan="10" id="tengah">
            Belum ada data tersedia
          </td>
        </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
</div>
@endsection
