<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class AndroidBookController extends Controller
{
    public function index()
    {
        $response['status'] = true;
        $response['message'] = 'Book Berhasil Didapatkan';
        $response['data'] = Book::get();

        return json_encode($response);
    }

    public function create(Request $request)
    {
        Book::create([
            'nama_buku' => $request->nama_buku,
            'penulis_buku' => $request->penulis_buku,
            'kategory_buku' => $request->kategory_buku,
            'stok' => $request->stok,
        ]);

        $response['status'] = true;
        $response['message'] = 'Book Berhasil Di Tambahkan';

        return json_encode($response);
    }

    public function edit(Request $request)
    {
        $book = Book::find($request->id);

        $response['status'] = true;
        $response['message'] = 'Berhasil Tampilkan Book';
        $response['data'] = $book;

        return json_encode($response);
    }

    public function update(Request $request)
    {
        $book = Book::where('id', $request->id)->first();
        $book->nama_buku = $request->nama_buku;
        $book->penulis_buku = $request->penulis_buku;
        $book->kategory_buku = $request->kategory_buku;
        $book->stok = $request->stok;
        $book->save();

        if ($book) {
            $response['status'] = true;
            $response['message'] = 'Berhasil Update Book';
            $response['data'] = $book;
        } else {
            $response['status'] = false;
            $response['message'] = 'Gagal Update Book';
            $response['data'] = null;
        }

        return json_encode($response);
    }

    public function destroy(Request $request)
    {
        $book = Book::find($request->id);
        $book->delete();

        $response['status'] = true;
        $response['message'] = 'Book Berhasil Di Delete';

        return json_encode($response);
    }
}
