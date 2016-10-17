@extends('layouts.app')
@section('content')
<div class="container">
  <div class="panel panel-primary">
    <div class="panel-body">
      <!--Distributor-->
      <?php
      $p=1;
      $d=1;
       ?>
       <div class="panel panel-default">
         <div class="panel-heading">
           Add New Distributor
         </div>
         <div class="panel-body">
           <form class="form" action="/addDistributor" method="post">
             {{csrf_field()}}
             <input type="hidden" name="_token" value="{{csrf_token()}}">
             <div class="col-sm-2">
               <div class="input-group">
                 <div class="input-group-addon"><span class="fa fa-truck"></span></div>
                 <input type="text" name="distributor" class="form-control" placeholder="Distributor">
               </div>
             </div>
             <div class="col-sm-3">
               <div class="input-group">
                 <div class="input-group-addon"><span class="fa fa-envelope"></span></div>
                 <input type="text" name="email" class="form-control" placeholder="Email">
               </div>
             </div>
             <div class="col-sm-3">
               <div class="input-group">
                 <div class="input-group-addon"><span class="fa fa-phone"></span></div>
                 <input type="text" name="phone" class="form-control" placeholder="Phone">
               </div>
             </div>
             <div class="col-sm-3">
               <div class="input-group">
                 <div class="input-group-addon"><span class="fa fa-home"></span></div>
                 <input type="text" name="address" class="form-control" placeholder="Address">
               </div>
             </div>
             <div class="col-sm-1">
               <button class="btn btn-default"><span class="fa fa-save"></span></button>
             </div>
           </form>
         </div>
         <table class="table table-striped table-bordered">
           <thead>
             <th>#</th>
             <th>Distributor</th>
             <th>Email</th>
             <th>Phone</th>
             <th>Address</th>
             <th><a href="#" class="btn btn-primary btn-xs pull-right"><span class="fa fa-plus"></span></a>Options</th>
           </thead>
           @if(count($distributor)>0)
           @foreach($distributor as $dist)
           <tbody>
             <td>{{$d++}}</td>
             <td>{{$dist->distributor}}</td>
             <td>{{$dist->email}}</td>
             <td>{{$dist->phone}}</td>
             <td>{{$dist->address}}</td>
             <td>
               <a href="#" class="btn btn-warning"><span class="fa fa-edit"></span></a>
               <a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
             </td>
           </tbody>
           @endforeach
           @else
           <tbody>
             <td colspan="6" id="tengah">
               Data belum Tersedia
             </td>
           </tbody>
           @endif
         </table>
       </div>
      <!--Publisher-->

      <div class="panel panel-default">
        <div class="panel-heading">
          Add New Publisher
        </div>
        <div class="panel-body">
          <form class="form" action="/addPublisher" method="post">
            {{csrf_field()}}
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="col-sm-2">
              <div class="input-group">
                <div class="input-group-addon"><span class="fa fa-user"></span></div>
                <input type="text" name="publisher" class="form-control" placeholder="Publisher">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="input-group">
                <div class="input-group-addon"><span class="fa fa-envelope"></span></div>
                <input type="text" name="email" class="form-control" placeholder="Email">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="input-group">
                <div class="input-group-addon"><span class="fa fa-phone"></span></div>
                <input type="text" name="phone" class="form-control" placeholder="Phone">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="input-group">
                <div class="input-group-addon"><span class="fa fa-home"></span></div>
                <input type="text" name="address" class="form-control" placeholder="Address">
              </div>
            </div>
            <div class="col-sm-1">
              <button class="btn btn-default"><span class="fa fa-save"></span></button>
            </div>
          </form>
        </div>
        <table class="table table-striped table-bordered">
            <thead id="distributor">
              <th>#</th>
              <th>Publisher</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th><a href="#" class="btn btn-primary btn-xs pull-right"><span class="fa fa-plus"></span></a>Options</th>
            </thead>
            @if(count($publisher)>0)
            @foreach($publisher as $pub)
            <tbody>
              <td>{{$p++}}</td>
              <td>{{$pub->publisher}}</td>
              <td>{{$pub->email}}</td>
              <td>{{$pub->phone}}</td>
              <td>{{$pub->address}}</td>
              <td>
                <a href="#" class="btn btn-warning"><span class="fa fa-edit"></span></a>
                <a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
              </td>
            </tbody>
            @endforeach
            @else
            <tbody>
              <td colspan="6" id="tengah">
                Data belum Tersedia
              </td>
            </tbody>
            @endif
          </table>
      </div>

    </div>
  </div>
</div>
@include('layouts.footer')
@endsection
