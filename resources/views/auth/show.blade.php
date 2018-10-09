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
            <div class="col-md-3">

                

                <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle"  width="200" height="200" @if($data->gambar) src="{{ asset('images/user/'.$data->gambar) }}" @endif />
                  <h3 class="profile-username text-center">{{$data->name}}</h3>
                  <p class="text-muted text-center">Software Engineer</p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Username</b> <a class="pull-right">{{ $data->username }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Email</b> <a class="pull-right">{{ $data->email }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Level</b> <a class="pull-right">{{ $data->level}}</a>
                    </li>
                  </ul>

                  <a href="{{route('user.index')}}" class="btn btn-primary btn-block"><b>Back</b></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
        </section><!-- /.content -->
                @endsection
