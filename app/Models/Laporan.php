<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = ['karyawan_id','cuti','absensi','status','periode'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    
}