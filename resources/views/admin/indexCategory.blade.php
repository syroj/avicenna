@extends('layouts.app')
@section('content')
<div class="container">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="row">
        <div class="col-sm-3">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="panel-title">
                Add New Category
              </div>
            </div>
            <div class="panel-body">
              <form class="form" action="/addCategory" method="post">
                {{csrf_field()}}
                <input type="text" name="category" class="form-control" placeholder="New Category">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
              </form>
            </div>
          </div>
        </div>
        <div class="col-sm-9">
          <table class="table table-striped table-bordered">
            <thead>
              <th>#</th>
              <th>Category</th>
              <th>Created</th>
              <th>Modified</th>
              <th colspan="2" id="tengah">Action</th>
            </thead>
            <?php
            $i=1;
            ?>
            @if(count($category)>0)
            @foreach($category as $cat)
            <tbody>
              <td>{{$i++}}</td>
              <td>{{$cat->category}}</td>
              <td>{{$cat->created_at}}</td>
              <td>{{$cat->updated_at}}</td>
              <td id="tengah">
                <div class="dropdown">
                  <a href="#" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><span class="fa fa-edit"></span> Edit <span class="caret"></span></a>
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
                  <a href="#" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-trash"></span> Delete <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li>
                      <div class="row" id="tengah">
                        <div class="col-sm-6">
                          <a href="/deleteCategory/{{$cat->id}}" class="btn btn-danger">Yes</a>
                        </div>
                        <div class="col-sm-6">
                          <a href="/category" class="btn btn-default">No</a>
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
              <td colspan="5" id="tengah">
                Data Tidak Tersedia
              </td>
            </tbody>
            @endif
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
