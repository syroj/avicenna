@extends('layouts.app')
@section('content')
<div class="container">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading">
              Edit Produk
            </div>
              @foreach($product as $p)
              <form class="form form-horizontal" action="edit-product" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="id" value="{{$p->id}}">

                <div class="panel-body">
                <div class="form-group">
                  <label class="label-form col-sm-3">Title</label>
                  <div class="col-sm-9">
                    <input type="text" name="title" class="form-control" value="{{$p->title}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="label-form col-sm-3">Category</label>
                  <div class="col-sm-9">
                    <select class="form-control">
                      @foreach($category as $c)
                      <option value="{{$c->id}}">{{$c->category}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <hr>
                <input type="file" name="photo">
              </div>
              <div class="panel-footer ">
                <a href="/product" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-default pull-right" name="submit">Simpan</button>
              </div>
              </form>
              @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
