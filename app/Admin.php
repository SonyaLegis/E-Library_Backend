<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['nama_petugas', 'jenis_kelamin', 'no_telephone', 'jabatan', 'alamat'];
}
