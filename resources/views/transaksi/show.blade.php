@extends('layouts.app')

@section('content')

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Detail <b>{{$data->kode_transaksi}}</b> </h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                <div class="box-body">
                    <div class="form-group">
                        <img class="product" width="200" height="200" @if($data->buku->cover) src="{{ asset('images/buku/'.$data->buku->cover) }}" @endif />
                </div>

                  <div class="box-body">
                    <div class="form-group{{ $errors->has('kode_transaksi') ? ' has-error' : '' }}">
                      <label for="kode_transaksi">Kode Transaksi</label>
                      <input id="kode_transaksi" type="text" class="form-control" name="kode_transaksi" value="{{$data->kode_transaksi}}" readonly>
                              </div>
                    </div>

                    <div class="box-body">
                    <div class="form-group{{ $errors->has('tgl_pinjam') ? ' has-error' : '' }}">
                      <label for="tgl_pinjam">Tanggal Pinjam</label>
                       <input id="tgl_pinjam" type="date" class="form-control" name="tgl_pinjam" value="{{ date('Y-m-d', strtotime($data->tgl_pinjam)) }}" readonly>
                        </div>
                    </div>

                    <div class="box-body">
                    <div class="form-group{{ $errors->has('tgl_kembali') ? ' has-error' : '' }}">
                      <label for="tgl_kembali" >Tanggal Kembali</label>
                       <input id="tgl_kembali" type="date" class="form-control" name="tgl_kembali" value="{{ date('Y-m-d', strtotime($data->tgl_kembali)) }}" readonly>
                            </div>
                    </div>

                    <div class="box-body">
                    <div class="form-group">
                      <label for="buku">Buku</label>
                        <input id="buku" type="text" class="form-control" value="{{$data->buku->judul}}" readonly>
                    </div>
                    </div>

                    <div class="box-body">
                    <div class="form-group">
                      <label for="anggota_id">Anggota</label>
                        <input id="anggota_id" type="text" class="form-control" value="{{$data->anggota->nama}}" readonly>
                    </div>
                    </div>

                    <div class="box-body">
                    <div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }}">
                      <label for="" >Status</label>
                        @if($data->status == 'pinjam')
                            <label class="badge badge-warning">Pinjam</label>
                        @else
                            <label class="badge badge-success">Kembali</label>
                        @endif
                            </div>
                    </div>


                    <div class="box-body">
                    <div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }}">
                      <label for="ket" >Keterangan</label>
                       <input id="ket" type="text" class="form-control" name="ket" value="{{ $data->ket }}" readonly>
                            </div>
                    </div>
                  <div class="box-footer">
                        <a href="{{route('transaksi.index')}}" class="btn btn-light pull-right">Back</a>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
                @endsection