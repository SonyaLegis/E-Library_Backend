<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BorrowBook;

class BorrowBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrow_books = BorrowBook::orderBy('id', 'asc')->paginate(5);
        return view('borrow_book.index', compact('borrow_books'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('borrow_book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nim_anggota' => 'required',
            'nama_anggota' => 'required',
            'kategory' => 'required',
            'nama_buku' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
        ]);

        BorrowBook::create($request->all());
        return redirect()->route('borrow_book.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $borrow_book = BorrowBook::find($id);
        return view('borrow_book.edit', compact('borrow_book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim_anggota' => 'required',
            'nama_anggota' => 'required',
            'kategory' => 'required',
            'nama_buku' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
        ]);
        $borrow_book = BorrowBook::find($id);
        $borrow_book->nim_anggota = $request->get('nim_anggota');
        $borrow_book->nama_anggota = $request->get('nama_anggota');
        $borrow_book->kategory = $request->get('kategory');
        $borrow_book->nama_buku = $request->get('nama_buku');
        $borrow_book->tanggal_pinjam = $request->get('tanggal_pinjam');
        $borrow_book->tanggal_kembali = $request->get('tanggal_kembali');
        $borrow_book->save();
        return redirect()->route('borrow_book.index')
            ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $borrow_book = BorrowBook::find($id);
        $borrow_book->delete();
        return redirect()->route('borrow_book.index')
            ->with('success', 'Data BorrowBook berhasil dihapus');
    }
}
