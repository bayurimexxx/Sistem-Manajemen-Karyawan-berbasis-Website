<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'karyawan_id',
        'gaji_pokok',
        'tunjangan',
        'potongan',
        'total_gaji',
        'periode',
        'status',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}