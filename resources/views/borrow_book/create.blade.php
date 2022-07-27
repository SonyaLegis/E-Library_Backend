@extends('layouts.app')
@section('content')

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pinjam Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class=" form-row">
            <div class="col-lg-12">
                <h3>Tambah Pinjam Buku</h3>
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

        <form action="{{route('borrow_book.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="nim_anggota" class="col-sm-2 col-form-label">Nim Anggota</label>
                <div class="col-sm-10">
                    <input type="text" name="nim_anggota" class="form-control" id="nim_anggota" placeholder="Nama Petugas">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_anggota" class="col-sm-2 col-form-label">Nama Anggota</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_anggota" class="form-control" id="nama_anggota" placeholder="Jenis Kelamin">
                </div>
            </div>
            <div class="form-group row">
                <label for="kategory" class="col-sm-2 col-form-label">Kategory</label>
                <div class="col-sm-10">
                    <input type="text" name="kategory" class="form-control" id="kategory" placeholder="No Telephone">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_buku" class="col-sm-2 col-form-label">Nama Buku</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_buku" class="form-control" id="nama_buku" placeholder="Jabatan">
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                <div class="col-sm-10">
                    <input type="text" name="tanggal_pinjam" class="form-control" id="tanggal_pinjam" placeholder="Alamat">
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal_kembali" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                <div class="col-sm-10">
                    <input type="text" name="tanggal_kembali" class="form-control" id="tanggal_kembali" placeholder="Alamat">
                </div>
            </div>
            <hr>
            <div class="form-group">
                <a href="{{route('borrow_book.index')}}" class="btn btn-success">Kembali</a>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>

    </div>
</body>

</html>

@endsection