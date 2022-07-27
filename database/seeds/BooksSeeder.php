<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            [
                'gambar_buku' => '\books\BukuKomputer.jpeg',
                'nama_buku' => 'Pengetahuan IT',
                'penulis_buku' => 'Dr. Daryanto',
                'kategory_buku' => 'Edukasi',
                'stok' => '5',
            ],
            [
                'gambar_buku' => '\books\BukuDoraemon.jpeg',
                'nama_buku' => 'Doraemon',
                'penulis_buku' => 'Fujiko Fujio',
                'kategory_buku' => 'Komik',
                'stok' => '3',
            ],
            [
                'gambar_buku' => '\books\BukuNovel.jpeg',
                'nama_buku' => 'Tentang Kamu',
                'penulis_buku' => 'Tere Liye',
                'kategory_buku' => 'Novel',
                'stok' => '9',
            ],
            [
                'gambar_buku' => '\books\BukuAgama.jpeg',
                'nama_buku' => 'Pengetahuan Tentang Islam',
                'penulis_buku' => 'Dr. H Abuddin',
                'kategory_buku' => 'Agama',
                'stok' => '6',
            ],
            [
                'gambar_buku' => '\books\BukuDunia,jpeg',
                'nama_buku' => 'Dunia Yang Disembunyikan',
                'penulis_buku' => 'Jonathan Black',
                'kategory_buku' => 'Sejarah',
                'stok' => '8',
            ],
        ]);
    }
}
