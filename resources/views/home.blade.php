@extends('layouts.app')
@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>( LaPer ) Laravel Perpustakaan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>{{$transaksi->count()}}</h3>
                  <p>Transaksi</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('transaksi.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{$transaksi->where('status', 'pinjam')->count()}}</h3>
                  <p>Sedang Pinjam</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{route('transaksi.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{$buku->count()}}</h3>
                  <p>Buku</p>
                </div>
                <div class="icon">
                  <i class="fa fa-book"></i>
                </div>
                <a href="{{route('buku.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>{{$anggota->count()}}</h3>
                  <p>Anggota</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="{{route('anggota.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Transaksi</h3>
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
@endsection