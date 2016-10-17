@extends('layouts.app')
@section('content')
<div class="container">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-right">
            <div class="btn-group">
              <a href="#" class="btn btn-default btn-sm"><span class="fa fa-file-pdf-o"></span> PDF</a>
              <a href="#" class="btn btn-default btn-sm"><span class="fa fa-file-excel-o"></span> Excel</a>
              <button class="btn btn-default btn-sm"> <span class="fa fa-calculator"></span> Manual</button>
            </div>
          </div>
          <form class="form-inline " action="{{url('OrdByRange')}}" method="get">
            <div class="input-group date" data-date-format="yyyy-mm-dd">
                <div class="input-group-addon">
                  <span class="fa fa-calendar"></span>
                </div>
                <input type="text" class="form-control" name="start" id="from">
                <div class="input-group-addon">
                  <span>-</span>
                </div>
                <input type="text" name="end" class="form-control" id="to">
            </div>
            <button type="submit" class="btn btn-sm btn-default" name="submit"><span class="fa fa-search"></span></button>
          </form>

        </div>
      </div>
      <?php $x=1; ?>
      <table class="table table-bordered">
        <thead>
          <th style="width:5%;">#</th>
          <th style="width:10%;">Order Id</th>
          <th style="width:10%;">Customer Id</th>
          <th>Tanggal</th>
          <th style="width:30%;">Title</th>
          <th style="width:10%;">Qty</th>
          <th style="width:10%;">Price</th>
          <th>Status</th>
          <th style="width:10%;" id="tengah">Option</th>
        </thead>
        <tbody>
          @if(count($orders) < 1)
          <tr>
            <td colspan="9" id="tengah">
              Tidak ada order.
            </td>
          </tr>
          @else
          @foreach($orders as $o)
          <tr>
            <td>{{$x++}}</td>
            <td>{{$o->order_id}}</td>
            <td>{{$o->cust_id}}</td>
            <td>{{$o->date}}</td>
            <td>{{$o->title}}</td>
            <td>{{$o->qty}}</td>
            <td>Rp. {{$o->price}} K</td>
            <td>{{$o->status}}</td>
            <td id="tengah">
              @if($o->status == 'success')
              <a  class="btn btn-danger btn-sm" href="{{url('cancelTrans',$o->order_id)}}"><span class="glyphicon glyphicon-trash"></span> Cancel</a>
              @else
              <button name="button" class="btn btn-default btn-sm">Canceled</button>
              @endif
            </td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
<script type="text/javascript">
$('#from').datepicker({
  format:'yyyy-mm-dd',
});
$('#to').datepicker({
  format:'yyyy-mm-dd',
});
</script>
@endsection
