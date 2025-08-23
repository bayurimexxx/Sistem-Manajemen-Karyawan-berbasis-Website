<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Manager extends Authenticatable
{
    protected $table = 'managers';

    protected $fillable = [
        'name',
        'nik',
        'jabatan',
        'tanggal_lahir',
        'status',
        'tanggal_masuk',
        'foto',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}