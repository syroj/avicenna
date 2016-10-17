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
              <a href="#" class="btn btn-default btn-sm"><span class="fa fa-file-excel-o"></span> Excell</a>
              <button class="btn btn-default btn-sm" id="manual"> <span class="fa fa-calculator"></span> Manual</button>
            </div>
          </div>
          <form class="form-inline" action="{{url('TransByRange')}}" method="get">
            <div class="input-group">
              <div class="input-group-addon">
                <span class="fa fa-calendar"></span>
              </div>
              <input type="text" name="start" class="form-control" placeholder="Awal" id="start">
              <div class="input-group-addon">
                -
              </div>
              <input type="text" name="end" class="form-control"  placeholder="Akhir" id="end">
            </div>
            <button type="submit" name="submit" class="btn btn-default btn-sm"><span class="fa fa-search"></span></button>
          </form>
        </div>
      </div>
      <?php
      $x=1;
       ?>
      <table class="table table-bordered">
        <thead>
          <th style="width:5%;">#</th>
          <th>Masuk</th>
          <th>Keluar</th>
          <th>Tanggal</th>
          <th style="width:20%;">Keterangan</th>
        </thead>
        <tbody>
          @if(count($transaction) < 1)
          <tr>
            <td colspan="5" id="tengah">Belum ada transaksi</td>
          </tr>
          @else
          @foreach($transaction as $t)
          <tr>
            <td>{{$x++}}</td>
            <td>Rp. {{$t->in}} K</td>
            <td>Rp. {{$t->out}} K</td>
            <td>{{$t->date}}</td>
            <td>{{$t->description}}</td>
          </tr>
          @endforeach
          <tr>
            <td colspan="3"></td>
            <td><strong>Saldo</strong></td>
            <td>Rp. {{$saldo}} K</td>
          </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('#start').datepicker({
    format:'yyyy-mm-dd',
  });
  $('#end').datepicker({
    format:'yyyy-mm-dd',
  });
</script>
@endsection
