@extends('layouts.app')
@section('content')

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>Daftar Buku</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-success" href="{{ route('book.create')}}"> Tambah Buku </a>
            </div>
        </div>
        <br>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th><b>No.</b></th>
                    <th>Gambar Buku</th>
                    <th>Nama Buku</th>
                    <th>Penulis Buku</th>
                    <th>Kategory Buku</th>
                    <th>Stok</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($books as $book)
            <tr>
                <td><b>{{++$i}}.<b></td>
                <td><img src={{$book->gambar_buku}} alt=""></td>
                <td>{{$book->nama_buku}}</td>
                <td align="center">{{$book->penulis_buku}}</td>
                <td>{{$book->kategory_buku}}</td>
                <td>{{$book->stok}}</td>
                <td>
                    <form action="{{ route('book.destroy',$book->id) }}" method="post">
                        <a class="btn btn-sm btn-warning" href="{{ route('book.edit', $book->id)}}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

        {!! $books->links() !!}
    </div>
</body>

</html>

@endsection