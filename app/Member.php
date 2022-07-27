<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['nama_lengkap', 'jenis_kelamin', 'no_telephone', 'tempat_tanggal_lahir', 'email', 'alamat'];
}
