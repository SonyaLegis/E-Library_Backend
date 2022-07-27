@extends('layouts.app')
@section('content')

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class=" form-row">
            <div class="col-lg-12">
                <h3>Edit Data Buku</h3>
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

        <form action="{{route('book.update',$book->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="gambar_buku" class="col-sm-2 col-form-label">Gambar Buku</label>
                <div class="col-sm-10">
                    <img src={{$book->gambar_buku}} alt="">
                    <input type="file" name="gambar_buku" class="form-control" id="gambar_buku" placeholder="Gambar Buku">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_buku" class="col-sm-2 col-form-label">Nama Buku</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_buku" class="form-control" id="nama_buku" value="{{$book->nama_buku}}" placeholder="Nama Buku">
                </div>
            </div>
            <div class="form-group row">
                <label for="penulis_buku" class="col-sm-2 col-form-label">Penulis Buku</label>
                <div class="col-sm-10">
                    <input type="text" name="penulis_buku" class="form-control" id="penulis_buku" value="{{$book->penulis_buku}}" placeholder="Penulis Buku">
                </div>
            </div>
            <div class="form-group row">
                <label for="kategory_buku" class="col-sm-2 col-form-label">Kategory Buku</label>
                <div class="col-sm-10">
                    <input type="text" name="kategory_buku" class="form-control" id="kategory_buku" value="{{$book->kategory_buku}}" placeholder="Penulis Buku">
                </div>
            </div>
            <div class="form-group row">
                <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                <div class="col-sm-10">
                    <input type="text" name="stok" class="form-control" id="stok" value="{{$book->stok}}" placeholder="Stok">
                </div>
            </div>
            <hr>
            <div class="form-group">
                <a href="{{route('book.index')}}" class="btn btn-success">Kembali</a>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>

    </div>
</body>

</html>

@endsection