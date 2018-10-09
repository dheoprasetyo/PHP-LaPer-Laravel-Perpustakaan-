
@extends('layouts.app')

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Tables
            <small>advanced tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Transaksi</li>
          </ol>
        </section>

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
                  <h3 class="box-title">Data Transaksi  <a href="{{ route('transaksi.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i></a></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Kode</th>
                        <th>Buku</th>
                        <th>Peminjam</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Status</th>
                        <th>Terlambat</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($datas as $data)
                      <tr>
                        <td class="py-1">
                          <a href="{{route('transaksi.show', $data->id)}}"> 
                            {{$data->kode_transaksi}}
                        </td>
                        <td>{{$data->buku->judul}}</td>
                        <td>{{$data->anggota->nama}}</td>
                        <td>
                        	{{date('d/m/y', strtotime($data->tgl_pinjam))}}
                        </td>
                        <td>
                            {{date('d/m/y', strtotime($data->tgl_kembali))}}
                          </td>
                        <td>
                          @if($data->status == 'pinjam')
                            <label class="badge badge-warning">Pinjam</label>
                          @else
                            <label class="badge badge-success">Kembali</label>
                          @endif
                        </td>
                        <td> 
                           @if($data->status == 'pinjam')
                           @php
                           $created = new Carbon($data->tgl_kembali);
                            $now = Carbon::now();
                            @endphp
                            {{$difference = ($created->diff($now)->days < 0) ? 'tidak terlambat' : $created->diffForHumans($now)}}
                           <!-- {{$cDate = Carbon::parse($data->tgl_kembali)->diffInDays()}} -->

                          <!-- {{$DeferenceInDays = Carbon::parse(Carbon::now())->diffInDays($data->tgl_kembali)}} -->
                          @else
                        Tidak Terlambat 
                          @endif

                           </td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-default">Action</button>
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                            @if($data->status == 'pinjam')
                            
                                <form class="" action="{{  route('transaksi.update', $data->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('put') }}
                              <li><button onclick="return confirm('Anda yakin data ini sudah kembali?')"> Sudah Kembali</button></li>
                                </form>
                            @else
                            
                              <form class="" action="{{  route('transaksi.destroy', $data->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                              <button onclick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</button>
                              </form>
                            </ul>
                          </div>
                          @endif



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
    <script>
      $(function () {
        $("#example1").DataTable();
      });
    </script>
@endsection
