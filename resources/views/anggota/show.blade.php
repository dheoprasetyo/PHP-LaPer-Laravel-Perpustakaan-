@section('js')
<script src="{{ URL::asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
@stop
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
                  <h3 class="box-title">Detail<b>{{$data->nama}}</b> </h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                <div class="box-body">
                    <div class="form-group">
                        <img class="product" width="200" height="200" @if($data->user->gambar) src="{{ asset('images/user/'.$data->user->gambar) }}" @endif />
                </div>

                  <div class="box-body">
                    <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                      <label for="nama">Nama</label>
                      <input id="nama" type="text" class="form-control" name="nama" value="{{ $data->nama }}" readonly>
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
                       <input id="npm" type="number" class="form-control" name="npm" value="{{ $data->npm }}" maxlength="8" readonly>
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
                       <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" value="{{ $data->tempat_lahir}}" readonly>
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
                        <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir" value="{{ $data->tgl_lahir }}" readonly>
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
                            <select class="form-control" name="jk" disabled="" required="">
                                <option value=""></option>
                                <option value="L" {{$data->jk === "L" ? "selected" : ""}}>Laki - Laki</option>
                                <option value="P" {{$data->jk === "P" ? "selected" : ""}}>Perempuan</option>
                            </select>
                            </div>
                        </div>
                    <div class="box-body">
                    <div class="form-group{{ $errors->has('prodi') ? ' has-error' : '' }}">
                            <label for="prodi">Prodi</label>
                            <select class="form-control" name="prodi" disabled="" required="">
                                <option value=""></option>
                                <option value="TI" {{$data->prodi === "TI" ? "selected" : ""}} >Teknik Informatika</option>
                                <option value="SI" {{$data->prodi === "SI" ? "selected" : ""}} >Sistem Informasi</option>
                                <option value="KM" {{$data->prodi === "KM" ? "selected" : ""}} >Kesehatan Masyarakat</option>
                            </select>
                            </div>
                        </div>
                    <div class="box-body">
                    <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }} ">
                            <label for="user_id">User Login</label>
                            <input id="" type="text" class="form-control" name="" value="{{ $data->user->username }}" readonly="">
                            </div>
                        </div>
                  <div class="box-footer">
                        <a href="{{route('anggota.index')}}" class="btn btn-light pull-right">Back</a>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
                @endsection
