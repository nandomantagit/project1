@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col md-12">
                <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Data Siswa</h3>
                        </div>
                        <div class="panel-body">
                            <form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Depan</label>
                                <input name="nama_depan" type="text" class="form-control" id="nama_depan" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$siswa->nama_depan}}">                                 
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Belakang</label>
                                    <input name="nama_belakang" type="text" class="form-control" id="nama_belakang" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{$siswa->nama_belakang}}">                                 
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                        <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                                        <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Agama</label>
                                    <input name="agama" type="text" class="form-control" id="agama" aria-describedby="emailHelp" placeholder="Agama" value="{{$siswa->agama}}">                                 
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="alamat" rows="3">{{$siswa->alamat}}</textarea>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{$siswa->email}}"> 
                                </div> --}}
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Avatar</label>
                                    <input type="file" name="avatar" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-warning">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
@stop

@section('content1')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Edit Data Siswa</h1>
        @if(session('sukses'))
            <div class="alert alert-success" role="alert">
                {{session('sukses')}}
            </div>
        @endif
            <div class="row"> 
                <div class="col-lg-12">
                <form action="/siswa/{{$siswa->id}}/update" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Depan</label>
                            <input name="nama_depan" type="text" class="form-control" id="nama_depan" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$siswa->nama_depan}}">                                 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Belakang</label>
                                <input name="nama_belakang" type="text" class="form-control" id="nama_belakang" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{$siswa->nama_belakang}}">                                 
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                    <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                                    <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Agama</label>
                                <input name="agama" type="text" class="form-control" id="agama" aria-describedby="emailHelp" placeholder="Agama" value="{{$siswa->agama}}">                                 
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Alamat</label>
                                <textarea name="alamat" class="form-control" id="alamat" rows="3">{{$siswa->alamat}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{$siswa->email}}"> 
                            </div>
                            <button type="submit" class="btn btn-warning">Update</button>
                    </form>
                </div>
            </div>
    </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

@endsection