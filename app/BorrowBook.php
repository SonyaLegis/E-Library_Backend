<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowBook extends Model
{
    protected $fillable = ['nim_anggota', 'nama_anggota', 'kategory', 'nama_buku', 'tanggal_pinjam', 'tanggal_kembali'];
}
