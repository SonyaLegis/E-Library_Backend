<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BorrowBooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('borrow_books')->insert([
            [
                'nim_anggota' => '30817095',
                'nama_anggota' => 'Aurelie',
                'kategory' => 'Sejarah',
                'nama_buku' => 'Dunia Yang Disembunyikan',
                'tanggal_pinjam' => 'Sabtu, 24 Maret 2021',
                'tanggal_kembali' => 'Sabtu, 24 Maret 2022',
            ],
            [
                'nim_anggota' => '30817100',
                'nama_anggota' => 'Yanto Calvaro',
                'kategory' => 'Novel',
                'nama_buku' => 'Tentang Kamu',
                'tanggal_pinjam' => 'Minggu, 28 April 2020',
                'tanggal_kembali' => 'Minggu, 28 April 2021',
            ],
        ]);
    }
}
