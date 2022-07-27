<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['gambar_buku', 'nama_buku', 'penulis_buku', 'nama_buku', 'kategory_buku', 'stok'];
}
