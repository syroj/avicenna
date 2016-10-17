@extends('layouts.app')
@section('content')
<div class="container">
  <div class="panel panel-primary">
    <form class="form form-horizontal" action="saveProduct" method="post" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="panel-body">
        <div class="form-group">
          <label class="control-label col-sm-2">Title:</label>
          <div class="col-sm-8">
            <input type="text" name="title" class="form-control" placeholder="Title">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Category:</label>
          <div class="col-sm-8">
            <select class="form-control" name="category">
              @foreach($category as $cat)
              <option value="{{$cat->id}}">{{$cat->category}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Price:</label>
          <div class="col-sm-8">
            <div class="col-sm-4">
              <input type="text" name="modal" class="form-control" placeholder="Modal">
            </div>
            <div class="col-sm-4">
              <input type="text" name="price"class="form-control" placeholder="Price">
            </div>
            <div class="col-sm-2">
              <input type="text" name="disc" class="form-control" placeholder="Disc">
            </div>
            <div class="col-sm-2">
              <input type="text" name="stock" class="form-control" placeholder="Stock">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Image:</label>
          <div class="col-sm-8">
            <input type="file" name="photo">
          </div>
        </div>
      </div>
      <div class="panel-footer">
        <div class="col-sm-9">
          <a href="#" class="btn btn-default pull-right"> Clear</a>
        </div>
        <button class="btn btn-primary " name="btnSave"> Save</button>
      </div>
    </form>
  </div>
</div>
@include('layouts.footer')
@endsection
