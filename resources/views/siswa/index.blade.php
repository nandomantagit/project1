@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Siswa</h3>
                                    <div class="right">
                                        <a href="/siswa/exportExcel" class="btn btn-sm btn-primary">Export Excel</a>
                                        <a href="/siswa/exportPdf" class="btn btn-sm btn-primary">Export PDF</a>

                                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                                            <i class="lnr lnr-plus-circle">Tambah Data</i>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-hover" id="datatable">
                                        <thead>
                                            <tr>
                                                <th>Nama Lengkap</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Agama</th>
                                                <th>Alamat</th>
                                                <th>Rata2 Nilai</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah data siswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body" >
                    <form action="/siswa/create" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group{{$errors->has('nama_depan') ? ' has-error' : ''}}">
                                <label for="exampleInputEmail1">Nama Depan</label>
                                <input name="nama_depan" type="text" class="form-control" id="nama_depan" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{old('nama_depan')}}">
                                @if($errors->has('nama_depan'))
                                     <span class="help-block">{{$errors->first('nama_depan')}}</span>
                                @endif

                            </div>
                            <div class="form-group{{$errors->has('nama_belakang') ? ' has-error' : ''}}">
                                <label for="exampleInputEmail1">Nama Belakang</label>
                                <input name="nama_belakang" type="text" class="form-control" id="nama_belakang" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{old('nama_belakang')}}">
                                @if($errors->has('nama_belakang'))
                                     <span class="help-block">{{$errors->first('nama_belakang')}}</span>
                                @endif                         
                            </div>
                            <div class="form-group{{$errors->has('email') ? ' has-error' : ''}}">
                                <label for="exampleInputEmail1">Email address</label>
                                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                @if($errors->has('email'))
                                    <span class="help-block">{{$errors->first('email')}}</span>
                                @endif
                            </div>
                            <div class="form-group{{$errors->has('jenis_kelamin') ? ' has-error' : ''}}">
                                <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                    <option value="L"{{(old('jenis_kelamin') == 'L') ? 'selected' : ''}}>Laki-laki</option>
                                    <option value="P"{{(old('jenis_kelamin') == 'P') ? 'selected' : ''}}>Perempuan</option>
                                </select>
                                @if($errors->has('jenis_kelamin'))
                                     <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                                @endif
                            </div>
                            <div class="form-group{{$errors->has('agama') ? ' has-error' : ''}}">
                                <label for="exampleInputEmail1">Agama</label>
                                <input name="agama" type="text" class="form-control" id="agama" aria-describedby="emailHelp" placeholder="Agama" value="{{old('agama')}}">
                                @if($errors->has('agama'))
                                     <span class="help-block">{{$errors->first('agama')}}</span>
                                @endif                                
                            </div>
                            <div class="form-group{{$errors->has('alamat') ? ' has-error' : ''}}">
                                <label for="exampleFormControlTextarea1">Alamat</label>
                                <textarea name="alamat" class="form-control" id="alamat" rows="3">{{old('alamat')}}</textarea>
                                @if($errors->has('alamat'))
                                <span class="help-block">{{$errors->first('alamat')}}</span>
                                @endif    
                            </div>
                            <div class="form-group{{$errors->has('avatar') ? ' has-error' : ''}}">
                                <label for="exampleFormControlTextarea1">Avatar</label>
                                <input type="file" name="avatar" class="form-control">
                                @if($errors->has('avatar'))
                                <span class="help-block">{{$errors->first('avatar')}}</span>
                                @endif   
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <script>
        $(document).ready(function(){
            $('#datatable').DataTable({
                processing:true,
                serverside:true,
                ajax:"{{route('ajax.get.data.siswa')}}",
                columns:[
                    {data:'nama_lengkap',name:'nama_lengkap'},
                    {data:'jenis_kelamin',name:'jenis_kelamin'},
                    {data:'agama',name:'agama'},
                    {data:'alamat',name:'alamat'},
                    {data:'rata2_nilai',name:'rata2_nilai'},
                    {data:'aksi',name:'aksi'},
                ]
            });            


            $('.delete').click(function(){
                var siswa_id = $(this).attr('siswa-id');
                swal({
                    title: "Anda yakin?",
                    text: "Hapus data siswa dengan id "+siswa_id + " ??",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    console.log(willDelete);
                    if (willDelete) {
                        window.location = "/siswa/"+siswa_id+"/delete";
                    }
                });
            });
        });
    </script>
@stop