<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

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

    // 🔹 Relasi ke Payroll
    public function payrolls()
    {
        return $this->hasMany(Payroll::class, 'karyawan_id');
    }

    // 🔹 Relasi ke Laporan
    public function laporans()
    {
        return $this->hasMany(Laporan::class, 'karyawan_id');
    }
}