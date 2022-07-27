<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('id', 'asc')->paginate(5);
        return view('book.index', compact('books'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
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
            'gambar_buku' => 'required|image|mimes:jpg,png,jpeg',
            'nama_buku' => 'required',
            'penulis_buku' => 'required',
            'kategory_buku' => 'required',
            'stok' => 'required',
        ]);

        $imagepath = $request['gambar_buku'];
        $filename = $imagepath->getClientOriginalName();
        $imagepath->move('books\\', $filename);

        $book = new Book();
        $book->gambar_buku = "\\books\\" . $filename;
        $book->nama_buku = request('nama_buku');
        $book->penulis_buku = request('penulis_buku');
        $book->kategory_buku = request('kategory_buku');
        $book->stok = request('stok');
        $book->save();

        return redirect()->route('book.index')
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
        $book = Book::find($id);
        return view('book.edit', compact('book'));
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
            'nama_buku' => 'required',
            'penulis_buku' => 'required',
            'kategory_buku' => 'required',
            'stok' => 'required',
        ]);
        if (request('gambar_buku')) {
            $imagepath = $request['gambar_buku'];
            $filename = $imagepath->getClientOriginalName();
            $imagepath->move('books\\', $filename);

            $book = Book::find($id);
            $book->gambar_buku = "\\books\\" . $filename;
            $book->nama_buku = request('nama_buku');
            $book->penulis_buku = request('penulis_buku');
            $book->kategory_buku = request('kategory_buku');
            $book->stok = request('stok');
            $book->save();
        } else {
            $book = Book::find($id);
            $book->nama_buku = $request->get('nama_buku');
            $book->penulis_buku = $request->get('penulis_buku');
            $book->kategory_buku = $request->get('kategory_buku');
            $book->stok = $request->get('stok');
            $book->save();
        }
        return redirect()->route('book.index')
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
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('book.index')
            ->with('success', 'Data Buku berhasil dihapus');
    }
}
