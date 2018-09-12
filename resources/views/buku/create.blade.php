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
                  <h3 class="box-title">Tambah Buku</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('buku.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="box-body">
                    <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                      <label for="judul">Judul</label>
                      <input id="judul" type="text" class="form-control" name="judul" value="{{ old('judul') }}" required>
                                @if ($errors->has('judul'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('judul') }}</strong>
                                    </span>
                                @endif
                              </div>
                    </div>
                    <div class="box-body">
                    <div class="form-group{{ $errors->has('isbn') ? ' has-error' : '' }}">
                      <label for="isbn">ISBN</label>
                       <input id="isbn" type="number" class="form-control" name="isbn" value="{{ old('isbn') }}" maxlength="8" required>
                                @if ($errors->has('isbn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('isbn') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="box-body">
                    <div class="form-group{{ $errors->has('pengarang') ? ' has-error' : '' }}">
                      <label for="pengarang" >Pengarang</label>
                       <input id="pengarang" type="text" class="form-control" name="pengarang" value="{{ old('pengarang') }}" required>
                                @if ($errors->has('pengarang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pengarang') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="box-body">
                    <div class="form-group{{ $errors->has('penerbit') ? ' has-error' : '' }}">
                      <label for="penerbit">Penerbit</label>
                        <input id="penerbit" type="text" class="form-control" name="penerbit" value="{{ old('penerbit') }}" required>
                                @if ($errors->has('penerbit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('penerbit') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="box-body">
                    <div class="form-group{{ $errors->has('tahun_terbit') ? ' has-error' : '' }}">
                      <label for="tahun_terbit">Tahun Terbit</label>
                        <input id="tahun_terbit" type="number" class="form-control" name="tahun_terbit" value="{{ old('tahun_terbit') }}" required>
                                @if ($errors->has('tahun_terbit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tahun_terbit') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="box-body">
                    <div class="form-group{{ $errors->has('jumlah_buku') ? ' has-error' : '' }}">
                      <label for="jumlah_buku">Jumlah Buku</label>
                        <input id="jumlah_buku" type="number" class="form-control" name="jumlah_buku" value="{{ old('jumlah_buku') }}" required>
                                @if ($errors->has('jumlah_buku'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah_buku') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="box-body">
                    <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                      <label for="deskripsi">Deskripsi</label>
                        <input id="deskripsi" type="text" class="form-control" name="deskripsi" value="{{ old('deskripsi') }}" required>
                                @if ($errors->has('deskripsi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('deskripsi') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="box-body">
                    <div class="form-group{{ $errors->has('lokasi') ? ' has-error' : '' }}">
                            <label for="lokasi">Jenis Kelamin</label>
                            <select class="form-control" name="lokasi" required="">
                               <option value="rak1">Rak 1</option>
                                <option value="rak2">Rak 2</option>
                                <option value="rak3">Rak 3</option>
                            </select>
                            </div>
                        </div>
                    <div class="box-body">
                        <label for="email">Cover</label>
                            <img class="product" width="200" height="200" />
                            <input type="file" class="uploads form-control" style="margin-top: 20px;" name="cover">
                    </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                    <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('buku.index')}}" class="btn btn-light pull-right">Back</a>
                  </div>
                      </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
                @endsection
<script src="{{ URL::asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>