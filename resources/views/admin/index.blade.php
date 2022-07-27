@extends('layouts.app')
@section('content')

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>Daftar Admin</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-success" href="{{ route('admin.create')}}"> Tambah Admin </a>
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
                    <th>Gambar Admin</th>
                    <th>Nama Petugas</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telephone</th>
                    <th>Jabatan</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($admins as $admin)
            <tr>
                <td><b>{{++$i}}.<b></td>
                <td><img src="\profile\Profile.jpeg" alt=""></td>
                <td>{{$admin->nama_petugas}}</td>
                <td align="center">{{$admin->jenis_kelamin}}</td>
                <td>{{$admin->no_telephone}}</td>
                <td>{{$admin->jabatan}}</td>
                <td>{{$admin->alamat}}</td>
                <td>
                    <form action="{{ route('admin.destroy',$admin->id) }}" method="post">
                        <a class="btn btn-sm btn-warning" href="{{ route('admin.edit', $admin->id)}}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

        {!! $admins->links() !!}
    </div>
</body>

</html>

@endsection