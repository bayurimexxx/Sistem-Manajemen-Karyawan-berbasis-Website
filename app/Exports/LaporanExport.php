<?php

namespace App\Exports;

use App\Models\Laporan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LaporanExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Laporan::with('karyawan')->get();
    }

    public function map($laporan): array
    {
        return [
            $laporan->id,
            $laporan->karyawan->name ?? '-',
            $laporan->cuti,
            $laporan->absensi,
            "Rp " . number_format(($laporan->absensi * 100000), 0, ',', '.'),
            $laporan->periode,
        ];
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Karyawan',
            'Cuti',
            'Absensi',
            'Total Gaji',
            'Periode'
        ];
    }
}