<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Absensi & Cuti</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Laporan Absensi & Cuti</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Cuti</th>
                <th>Absensi</th>
                <th>Status</th>
                <th>Periode</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporans as $laporan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $laporan->karyawan->name ?? '-' }}</td>
                    <td>{{ $laporan->cuti }}</td>
                    <td>{{ $laporan->absensi }}</td>
                    <td>{{ $laporan->status }}</td>
                    <td>{{ \Carbon\Carbon::parse($laporan->periode)->format('F Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
