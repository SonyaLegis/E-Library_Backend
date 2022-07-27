<?php

namespace App\Http\Controllers;

use App\BorrowBook;
use Illuminate\Http\Request;

class AndroidBorrowBookController extends Controller
{
    public function index()
    {
        $response['status'] = true;
        $response['message'] = 'BorrowBook Berhasil Didapatkan';
        $response['data'] = BorrowBook::get();

        return json_encode($response);
    }

    public function create(Request $request)
    {
        BorrowBook::create([
            'nim_anggota' => $request->nim_anggota,
            'nama_anggota' => $request->nama_anggota,
            'kategory' => $request->kategory,
            'nama_buku' => $request->nama_buku,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);

        $response['status'] = true;
        $response['message'] = 'BorrowBook Berhasil Di Tambahkan';

        return json_encode($response);
    }

    public function edit(Request $request)
    {
        $borrow_book = BorrowBook::find($request->id);

        $response['status'] = true;
        $response['message'] = 'Berhasil Tampilkan BorrowBook';
        $response['data'] = $borrow_book;

        return json_encode($response);
    }

    public function update(Request $request)
    {
        $borrow_book = BorrowBook::where('id', $request->id)->first();
        $borrow_book->nim_anggota = $request->nim_anggota;
        $borrow_book->nama_anggota = $request->nama_anggota;
        $borrow_book->kategory = $request->kategory;
        $borrow_book->nama_buku = $request->nama_buku;
        $borrow_book->tanggal_pinjam = $request->tanggal_pinjam;
        $borrow_book->tanggal_kembali = $request->tanggal_kembali;
        $borrow_book->save();

        if ($borrow_book) {
            $response['status'] = true;
            $response['message'] = 'Berhasil Update BorrowBook';
            $response['data'] = $borrow_book;
        } else {
            $response['status'] = false;
            $response['message'] = 'Gagal Update BorrowBook';
            $response['data'] = null;
        }

        return json_encode($response);
    }

    public function destroy(Request $request)
    {
        $borrow_book = BorrowBook::find($request->id);
        $borrow_book->delete();

        $response['status'] = true;
        $response['message'] = 'BorrowBook Berhasil Di Delete';

        return json_encode($response);
    }
}
