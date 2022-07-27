@extends('layouts.app')
@section('content')

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Member</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class=" form-row">
            <div class="col-lg-12">
                <h3>Tambah Member</h3>
            </div>
        </div>
        <br>

        @if ($errors->all())
        <div class="alert alert-danger">
            <strong>Whoops! </strong> Ada permasalahan inputanmu.<br>
            <ul>
                @foreach ($errors as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{route('member.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="Nama Petugas">
                </div>
            </div>
            <div class="form-group row">
                <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <input type="text" name="jenis_kelamin" class="form-control" id="jenis_kelamin" placeholder="Jenis Kelamin">
                </div>
            </div>
            <div class="form-group row">
                <label for="no_telephone" class="col-sm-2 col-form-label">No Telephone</label>
                <div class="col-sm-10">
                    <input type="text" name="no_telephone" class="form-control" id="no_telephone" placeholder="No Telephone">
                </div>
            </div>
            <div class="form-group row">
                <label for="tempat_tanggal_lahir" class="col-sm-2 col-form-label">Tempat Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="text" name="tempat_tanggal_lahir" class="form-control" id="tempat_tanggal_lahir" placeholder="Jabatan">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" id="email" placeholder="Alamat">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat">
                </div>
            </div>
            <hr>
            <div class="form-group">
                <a href="{{route('member.index')}}" class="btn btn-success">Kembali</a>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>

    </div>
</body>

</html>

@endsection