
@extends('layouts.app')

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Tables
            <small>advanced tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
          </ol>
        </section>
        <div class="col-lg-2">
  </div>
    <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
                  </div>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data User <a href="{{ route('user.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i></a></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($datas as $data)
                      <tr>
                        <td class="py-1">
                           @if($data->gambar)
                            <img src="{{url('images/user', $data->gambar)}}" alt="image" width="50" height="50" />
                          @else
                            <img src="{{url('images/user/default.png')}}" alt="image" width="50" height="50" />
                          @endif
                          {{$data->name}}
                        </td>
                        <td><a href="{{route('user.show', $data->id)}}"> 
                            {{$data->username}}
                        </td>
                        <td>
                          {{$data->email}}
                        </td>
                        <td>
                          {{$data->created_at}}
                        </td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-default">Action</button>
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                              <a href="{{route('user.edit', $data->id)}}" class="btn btn-xs btn-success">Edit</a>
                              <!-- <form class="" action="{{route('user.edit', $data->id)}}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                {{ method_field('put') }}
                              <li><button>Edit</button></li>
                                </form> -->
                              <form class="" action="{{ route('user.destroy', $data->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                              <button  onclick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</button>
                              </form>
                            </ul>
                          </div>





<!-- 
                          <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            <a class="dropdown-item" href="{{route('anggota.edit', $data->id)}}"> Edit </a>
                            <form action="{{ route('anggota.destroy', $data->id) }}" class="pull-left"  method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                            </button>
                          </form> -->
                           
                         
                      </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

@endsection
@section('js')
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
      });
    </script>
@endsection