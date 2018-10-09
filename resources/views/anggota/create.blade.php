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
                  <h3 class="box-title">Tambah Anggota</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('anggota.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="box-body">
                    <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                      <label for="nama">Nama</label>
                      <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required>
                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                              </div>
                    </div>
                    <div class="box-body">
                    <div class="form-group{{ $errors->has('npm') ? ' has-error' : '' }}">
                      <label for="npm">NPM</label>
                       <input id="npm" type="number" class="form-control" name="npm" value="{{ old('npm') }}" maxlength="8" required>
                                @if ($errors->has('npm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('npm') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="box-body">
                    <div class="form-group{{ $errors->has('tempat_lahir') ? ' has-error' : '' }}">
                      <label for="tempat_lahir" >Tempat Lahir</label>
                       <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                                @if ($errors->has('tempat_lahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="box-body">
                    <div class="form-group{{ $errors->has('tgl_lahir') ? ' has-error' : '' }}">
                      <label for="tgl_lahir">Tanggal Lahir</label>
                        <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required>
                                @if ($errors->has('tgl_lahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="box-body">
                    <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                            <label for="level">Jenis Kelamin</label>
                            <select class="form-control" name="jk" required="">
                                <option value=""></option>
                                <option value="L">Laki - Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            </div>
                        </div>
                    <div class="box-body">
                    <div class="form-group{{ $errors->has('prodi') ? ' has-error' : '' }}">
                            <label for="prodi">Prodi</label>
                            <select class="form-control" name="prodi" required="">
                                <option value=""></option>
                                <option value="TI">Teknik Informatika</option>
                                <option value="SI">Sistem Informasi</option>
                                <option value="KM">Kesehatan Masyarakat</option>
                            </select>
                            </div>
                        </div>
                    <div class="box-body">
                    <div class="form-group{{ $errors->has('jumlah') ? ' has-error' : '' }}">
                      <!-- <label for="jumlah">Pernah Pinjam</label> -->
                       <input id="jumlah" type="hidden" class="form-control" name="jumlah" value="{{($jumlah) }}" required readonly="">
                                @if ($errors->has('jumlah'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                    <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('anggota.index')}}" class="btn btn-light pull-right">Back</a>
                  </div>
                      </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
</section>

                @endsection
<!-- <script src="{{ URL::asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script> -->