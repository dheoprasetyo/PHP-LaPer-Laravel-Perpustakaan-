@extends('layouts.app')

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            General Form Elements
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit User</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('user.update', $data->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                  <div class="box-body">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="name">Nama</label>
                      <input id="name" type="text" class="form-control" name="name" value="{{ $data->name }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                              </div>
                    </div>
                    <div class="box-body">
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                      <label for="username">username</label>
                       <input id="username" type="text" class="form-control" name="username" value="{{ $data->username }}" maxlength="8" required readonly="">
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="box-body">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <label for="email" >Email</label>
                       <input id="email" type="email" class="form-control" name="email" value="{{ $data->email }}" required readonly="">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="box-body">
                        <label for="gambar">Gambar</label>
                            <img class="product" width="200" height="200" @if($data->gambar) src="{{ asset('images/user/'.$data->gambar) }}" @endif />
                            <input type="file" class="uploads form-control" style="margin-top: 20px;" name="gambar">
                    </div>
                     @if(Auth::user()->level == 'admin')
                    <div class="box-body">
                    <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                            <label for="level">Level</label>
                            <select class="form-control" name="level" required="">
                                <option value="admin" @if($data->level == 'admin') selected @endif > Admin</option>
                                <option value="user"  @if($data->level == 'user') selected @endif>User</option>
                            </select>
                            </div>
                        </div>
                    @endif
                    <div class="box-body">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} ">
                            <label for="password">Password</label>
                             <input id="password" type="password" class="form-control" onkeyup='check();' name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    <div class="box-body">
                            <label for="password-confirm">Confirm Password</label>
                             <input id="confirm_password" type="password" class="form-control" onkeyup='check();' name="password_confirmation" required>
                                    <span id="message">
                                    </span>
                        </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" id="submit">Update</button>
                    <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('user.index')}}" class="btn btn-light pull-right">Back</a>
                  </div>
                      </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
                @endsection
<script type="text/javascript">  
var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('submit').disabled = false;
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('submit').disabled = true;
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
</script>