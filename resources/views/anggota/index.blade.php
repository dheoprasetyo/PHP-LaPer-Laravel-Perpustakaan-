
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
                  <h3 class="box-title">Data Anggota <a href="{{ route('anggota.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i></a></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <p> <a href="{{ url('anggota_pdf') }}" class="btn btn-success btn-rounded btn-fw"><i class="fa fa-download"></i> Export PDF</a></p>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Npm</th>
                        <th>Prodi</th>
                        <th>Jenis Kelamin</th>
                        <th>Pernah Pinjam</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($datas as $data)
                      <tr>
                        <td >
                          {{$data->nama}}
                        </td>
                        <td><a href="{{route('anggota.show', $data->id)}}"> 
                            {{$data->npm}}</td>
                        <td> @if($data->prodi == 'TI')
                            Teknik Informatika
                          @elseif($data->prodi == 'SI')
                            Sistem Informasi
                          @else
                            Kesehatan Masyarakat
                          @endif</td>
                        <td>
                        	{{$data->jk === "L" ? "Laki - Laki" : "Perempuan"}}
                        </td>
                        <td>{{$data->jumlah}}</td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-default">Action</button>
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                              <form class="" action="{{  route('anggota.edit', $data->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('GET') }}
                              <li><button class="dropdown-item" > Edit</button></li>
                                </form>
                              <!-- <a href="{{route('anggota.edit', $data->id)}}" class="btn btn-flat btn-default">Edit</a> -->
                              <!-- <form class="" action="{{route('user.edit', $data->id)}}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                {{ method_field('put') }}
                              <li><button>Edit</button></li>
                                </form> -->
                              <form class="" action="{{ route('anggota.destroy', $data->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                              <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</button>
                              </form>
                            </ul>
                          </div>

                        	<!-- <a href="{{route('anggota.edit', $data->id)}}" class="btn btn-xs btn-success">Edit</a>
                        	<form class="" action="{{ route('anggota.destroy', $data->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE')}}
                            <button type="submit" class="btn btn-xs btn-danger  pull-right ">Hapus</button>
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
<!-- jQuery 2.1.4 -->
<!--    <script src="{{ URL::asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script> -->
    <!-- Bootstrap 3.3.5 -->

    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
@stop