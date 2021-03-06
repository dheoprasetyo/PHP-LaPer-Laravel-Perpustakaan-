@section('js')

<script type="text/javascript"> 
      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputgambar").change(function () {
        readURL(this);
    });
</script>
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
                  <h3 class="box-title">Edit Buku</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('buku.update', $data->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                  <div class="box-body">
                    <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                      <label for="judul">Judul</label>
                      <input id="judul" type="text" class="form-control" name="judul" value="{{ $data->judul }}" required>
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
                       <input id="isbn" type="number" class="form-control" name="isbn" value="{{ $data->isbn }}" maxlength="8" required>
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
                       <input id="pengarang" type="text" class="form-control" name="pengarang" value="{{ $data->pengarang }}" required>
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
                        <input id="penerbit" type="text" class="form-control" name="penerbit" value="{{ $data->penerbit }}" required>
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
                        <input id="tahun_terbit" type="number" class="form-control" name="tahun_terbit" value="{{ $data->tahun_terbit }}" required>
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
                        <input id="jumlah_buku" type="number" class="form-control" name="jumlah_buku" value="{{ $data->jumlah_buku }}" required>
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
                        <input id="deskripsi" type="text" class="form-control" name="deskripsi" value="{{ $data->deskripsi }}" required>
                                @if ($errors->has('deskripsi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('deskripsi') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="box-body">
                    <div class="form-group{{ $errors->has('lokasi') ? ' has-error' : '' }}">
                            <label for="lokasi">Lokasi</label>
                            <select class="form-control" name="lokasi" required="">
                               <option value="rak1" {{$data->lokasi === "rak1" ? "selected" : ""}}>Rak 1</option>
                                <option value="rak2" {{$data->lokasi === "rak2" ? "selected" : ""}}>Rak 2</option>
                                <option value="rak3" {{$data->lokasi === "rak3" ? "selected" : ""}}>Rak 3</option>
                            </select>
                            </div>
                        </div>
                    <div class="box-body">
                        <label for="email">Cover</label>
                            <img class="product" id="showgambar" width="200" height="200" @if($data->cover) src="{{ asset('images/buku/'.$data->cover) }}" @endif />
                            <input type="file" id="inputgambar" class="uploads form-control" style="margin-top: 20px;" name="cover">
                    </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" id="submit">Update</button>
                    <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('buku.index')}}" class="btn btn-light pull-right">Back</a>
                  </div>
                      </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
        </section><!-- /.content -->
                @endsection
