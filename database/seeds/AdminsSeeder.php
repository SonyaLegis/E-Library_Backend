<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'nama_petugas' => 'Irwan Banda',
                'jenis_kelamin' => 'Laki - Laki',
                'no_telephone' => '0896602908',
                'jabatan' => 'Admin',
                'alamat' => 'Cikarang',
            ],
            [
                'nama_petugas' => 'Aurelie',
                'jenis_kelamin' => 'Perempuan',
                'no_telephone' => '0896602904',
                'jabatan' => 'Admin',
                'alamat' => 'Bogor',
            ],
            [
                'nama_petugas' => 'Yanto Calvaro',
                'jenis_kelamin' => 'Laki - Laki',
                'no_telephone' => '0896602996',
                'jabatan' => 'Admin',
                'alamat' => 'Jakarta',
            ],
        ]);
    }
}
