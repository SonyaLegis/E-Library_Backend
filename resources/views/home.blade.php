@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="content">
                <div class="title m-b-md">
                    E-Library
                </div>
            </div>
            <div class="links">
                <a href="{{ route('book.index')}}">Daftar Buku</a>
                <a href="{{ route('borrow_book.index')}}">Pinjam Buku</a>
                <a href="{{ route('member.index')}}">Anggota</a>
                <a href="{{ route('admin.index')}}">Admin</a>
            </div>
        </div>
    </div>
</div>
@endsection