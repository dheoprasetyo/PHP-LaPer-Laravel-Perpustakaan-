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
                  <h3 class="box-title">Tambah Transaksi</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('transaksi.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="box-body">
                    <div class="form-group{{ $errors->has('kode_transaksi') ? ' has-error' : '' }}">
                      <label for="kode_transaksi">Kode transaksi</label>
                      <input id="kode_transaksi" type="text" class="form-control" name="kode_transaksi" value="{{($kode) }}" required readonly="">
                                @if ($errors->has('kode_transaksi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_transaksi') }}</strong>
                                    </span>
                                @endif
                              </div>
                    </div>
                    <div class="box-body">
                    <div class="form-group{{ $errors->has('tgl_pinjam') ? ' has-error' : '' }}">
                      <label for="tgl_pinjam">Tgl pinjam</label>
                       <input id="tgl_pinjam" type="text" class="form-control" name="tgl_pinjam" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" required  @if(Auth::user()->level == 'user') readonly @endif>
                                @if ($errors->has('tgl_pinjam'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_pinjam') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="box-body">
                    <div class="form-group{{ $errors->has('tgl_kembali') ? ' has-error' : '' }}">
                      <label for="tgl_kembali" >Tanggal Kembali</label>
                       <input id="tgl_kembali" type="text" class="form-control" name="tgl_kembali" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->addDays(5)->toDateString())) }}"  required @if(Auth::user()->level == 'user') readonly @endif>
                                @if ($errors->has('tgl_kembali'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_kembali') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="box-body">
                    <div class="form-group{{ $errors->has('buku_id') ? ' has-error' : '' }}">
                      <label for="buku_id">Buku</label>
                      <div class="input-group">
                        <input id="buku_judul" type="text" class="form-control" readonly="" required>
                        <input id="buku_id" type="hidden" name="buku_id" value="{{ old('buku_id') }}" required readonly="">
                      <span class="input-group-btn">
                        <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><b>Cari Buku</b> <span class="fa fa-search"></span></button>
                      </span>
                      </div>
                                @if ($errors->has('buku_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('buku_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    @if(Auth::user()->level == 'admin')
                    <div class="box-body">
                    <div class="form-group{{ $errors->has('anggota_id') ? ' has-error' : '' }}">
                      <label for="anggota_id">Anggota</label>
                      <div class="input-group">
                        <input id="anggota_nama" type="text" class="form-control" readonly="" required>
                        <input id="anggota_id" type="hidden" name="anggota_id" value="{{ old('anggota_id') }}" required readonly="">
                      <span class="input-group-btn">
                        <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal2"><b>Cari Anggota</b> <span class="fa fa-search"></span></button>
                      </span>
                      </div>
                                @if ($errors->has('anggota_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('anggota_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    @else
                     <div class="box-body">
                    <div class="form-group{{ $errors->has('anggota_id') ? ' has-error' : '' }}">
                      <label for="anggota_id">Anggota</label>
                       <input id="anggota_nama" type="text" class="form-control" readonly="" value="{{Auth::user()->anggota->nama}}" required>
                       <input id="anggota_id" type="hidden" name="anggota_id" value="{{ Auth::user()->anggota->id }}" required readonly="">
                                @if ($errors->has('anggota_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('anggota_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    @endif
                    <div class="box-body">
                    <div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }}">
                      <label for="ket" >Keterangan</label>
                       <input id="ket" type="text" class="form-control" name="ket" value="{{ old('ket') }}">
                                @if ($errors->has('ket'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ket') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                    <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('transaksi.index')}}" class="btn btn-light pull-right">Back</a>
                  </div>
                      </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="looked" class="table table-bordered table-striped">
            <thead>
                      <tr>
                        <th>Judul</th>
                        <th>ISBN</th>
                        <th>Pengarang</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                      </tr>
                    </thead>
                    <tbody>
                   @foreach($bukus as $data)
                                <tr class="pilih" data-buku_id="<?php echo $data->id; ?>" data-buku_judul="<?php echo $data->judul; ?>" >
                                    <td>@if($data->cover)
                            <img src="{{url('images/buku/'. $data->cover)}}" alt="image"  width="50" height="50" />
                          @else
                            <img src="{{url('images/buku/default.png')}}" alt="image" width="50" height="50" />
                          @endif
                          {{$data->judul}}</td>
                                    <td>{{$data->isbn}}</td>
                                    <td>{{$data->pengarang}}</td>
                                    <td>{{$data->tahun_terbit}}</td>
                                    <td>{{$data->jumlah_buku}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>

<!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Anggota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="looked" class="table table-bordered table-striped">
                            <thead>
                        <tr>
                          <th>
                            Nama
                          </th>
                          <th>
                            NPM
                          </th>
                          <th>
                            Prodi
                          </th>
                          <th>
                            Jenis Kelamin
                          </th>
                        </tr>
                      </thead>
                            <tbody>
                                @foreach($anggotas as $data)
                                <tr class="pilih_anggota" data-anggota_id="<?php echo $data->id; ?>" data-anggota_nama="<?php echo $data->nama; ?>" >
                                    <td class="py-1">
                          @if($data->user->gambar)
                            <img src="{{url('images/user', $data->user->gambar)}}" alt="image" width="50" height="50" />
                          @else
                            <img src="{{url('images/user/default.png')}}" alt="image" width="50" height="50" />
                          @endif

                            {{$data->nama}}
                          </td>
                          <td>
                            {{$data->npm}}
                          </td>

                          <td>
                          @if($data->prodi == 'TI')
                            Teknik Informatika
                          @elseif($data->prodi == 'SI')
                            Sistem Informasi
                          @else
                            Kesehatan Masyarakat
                          @endif
                          </td>
                          <td>
                            {{$data->jk === "L" ? "Laki - Laki" : "Perempuan"}}
                          </td>
                        </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>


                @endsection
<script src="{{ URL::asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

 <script type="text/javascript">
   $(document).on('click', '.pilih', function (e) {
                document.getElementById("buku_judul").value = $(this).attr('data-buku_judul');
                document.getElementById("buku_id").value = $(this).attr('data-buku_id');
                $('#myModal').modal('hide');
            });

            $(document).on('click', '.pilih_anggota', function (e) {
                document.getElementById("anggota_id").value = $(this).attr('data-anggota_id');
                document.getElementById("anggota_nama").value = $(this).attr('data-anggota_nama');
                $('#myModal2').modal('hide');
            });
          
             $(function () {
                $("#looked, #looked2").dataTable();
            });

        </script>

