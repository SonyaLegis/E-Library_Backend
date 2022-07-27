@extends('layouts.app')
@section('content')

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Pinjam Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>Daftar Pinjam Buku</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-success" href="{{ route('borrow_book.create')}}"> Tambah Pinjam Buku </a>
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
                    <th>Gambar Pinjam Buku</th>
                    <th>Nim Anggota</th>
                    <th>Nama Anggota</th>
                    <th>Kategory</th>
                    <th>Nama Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($borrow_books as $borrow_book)
            <tr>
                <td><b>{{++$i}}.<b></td>
                <td><img src="\profile\Mahasiswa.png" alt=""></td>
                <td>{{$borrow_book->nim_anggota}}</td>
                <td align="center">{{$borrow_book->nama_anggota}}</td>
                <td>{{$borrow_book->kategory}}</td>
                <td>{{$borrow_book->nama_buku}}</td>
                <td>{{$borrow_book->tanggal_pinjam}}</td>
                <td>{{$borrow_book->tanggal_kembali}}</td>
                <td>
                    <form action="{{ route('borrow_book.destroy',$borrow_book->id) }}" method="post">
                        <a class="btn btn-sm btn-warning" href="{{ route('borrow_book.edit', $borrow_book->id)}}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

        {!! $borrow_books->links() !!}
    </div>
</body>

</html>

@endsection