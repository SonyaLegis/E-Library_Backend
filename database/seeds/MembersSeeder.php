<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            [
                'nama_lengkap' => 'Irwan Banda',
                'jenis_kelamin' => 'Laki - Laki',
                'no_telephone' => '0896602908',
                'tempat_tanggal_lahir' => 'Nyarumkop, 13-08-1980',
                'email' => 'irwanbandae@gmail.com',
                'alamat' => 'Jl. Bermis Raya No. 101 Jakbar',
            ],
            [
                'nama_lengkap' => 'Aurelie',
                'jenis_kelamin' => 'Perempuan',
                'no_telephone' => '0896602904',
                'tempat_tanggal_lahir' => 'Jakarta, 13-06-1999',
                'email' => 'aurelie@gmail.com',
                'alamat' => 'Jl. Bekasi Raya No. 101 Jakut',
            ],
            [
                'nama_lengkap' => 'Yanto Calvaro',
                'jenis_kelamin' => 'Laki - Laki',
                'no_telephone' => '0896602996',
                'tempat_tanggal_lahir' => 'Sumedang, 13-08-1920',
                'email' => 'yancalva@gmail.com',
                'alamat' => 'Jl. Bandung Raya No. 101 Jaktim',
            ],
        ]);
    }
}
