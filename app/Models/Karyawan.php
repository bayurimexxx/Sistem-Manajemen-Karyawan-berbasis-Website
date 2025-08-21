<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Karyawan extends Authenticatable
{
    protected $table = 'karyawans';

    protected $fillable = [
        'foto',
        'name',
        'nik',
        'jabatan',
        'tanggal_lahir',
        'status',
        'tanggal_masuk',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}