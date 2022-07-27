@extends('layouts.app')
@section('content')

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Member</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>Daftar Member</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-success" href="{{ route('member.create')}}"> Tambah Member </a>
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
                    <th>Gambar Member</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telephone</th>
                    <th>Tempat Tanggal Lahir</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($members as $member)
            <tr>
                <td><b>{{++$i}}.<b></td>
                <td><img src="\profile\Mahasiswa.png" alt=""></td>
                <td>{{$member->nama_lengkap}}</td>
                <td align="center">{{$member->jenis_kelamin}}</td>
                <td>{{$member->no_telephone}}</td>
                <td>{{$member->tempat_tanggal_lahir}}</td>
                <td>{{$member->email}}</td>
                <td>{{$member->alamat}}</td>
                <td>
                    <form action="{{ route('member.destroy',$member->id) }}" method="post">
                        <a class="btn btn-sm btn-warning" href="{{ route('member.edit', $member->id)}}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

        {!! $members->links() !!}
    </div>
</body>

</html>

@endsection