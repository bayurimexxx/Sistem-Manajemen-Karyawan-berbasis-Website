<!DOCTYPE html>
<html>
<head>
    <title>Laporan Absensi, Cuti & Gaji</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Absensi, Cuti & Gaji</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Cuti</th>
                <th>Absensi</th>
                <th>Total Gaji</th>
                <th>Periode</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporans as $index => $laporan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $laporan->karyawan->name ?? '-' }}</td>
                    <td>{{ $laporan->cuti }}</td>
                    <td>{{ $laporan->absensi }}</td>
                    <td>
                        Rp {{ number_format($laporan->absensi * 100000, 0, ',', '.') }}
                    </td>
                    <td>{{ $laporan->periode }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
