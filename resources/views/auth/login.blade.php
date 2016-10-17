@extends('layouts.masuk')
@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="panel panel-default">
            <div class="panel-body"style="padding-top:40px;">
              <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                  <label for="username" class="col-md-4 control-label">Username</label>
                  <div class="col-md-6">
                    <div class="input-group">
                      <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
                      <div class="input-group-addon">
                        <span class="glyphicon glyphicon-user"></span>
                      </div>
                      @if ($errors->has('email'))
                      <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="password" class="col-md-4 control-label">Password</label>

                  <div class="col-md-6">
                    <div class="input-group">
                      <input id="password" type="password" class="form-control" name="password" required>
                      <div class="input-group-addon">
                        <span class="fa fa-key"></span>
                      </div>
                      @if ($errors->has('password'))
                      <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="remember"> Remember Me <span class="glyphicon glyphicon-retweet" style="color:green;"></span>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-8 col-md-offset-8">
                    <button type="submit" class="btn btn-primary">
                      Login
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
            <p id="tengah">
              Avicenna Book Store V.2.0 App by: <a href="https://www.facebook.com/dr.syroj"><span class="fa fa-facebook-square"></span> Syroj</a>
            </p>
        </div>
      </div>
    </div>
@endsection
