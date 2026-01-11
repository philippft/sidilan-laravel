<!DOCTYPE html>
<html>
<head>
    <title>Cetak Data Pegawai</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; font-size: 11px; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
        
        @media print {
            .no-print { display: none; }
            @page { size: A4 portrait; margin: 1cm; }
        }
    </style>
</head>
<body>

    <h2 style="text-transform: uppercase;">Daftar Data Pegawai</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>NIP</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>
                <th>Tipe Posisi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($people as $key => $person)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $person->full_name }}</td>
                <td>{{ $person->nip }}</td>
                <td>{{ $person->gender }}</td>
                <td>{{ $person->position->name ?? '-' }}</td>
                <td>{{ $person->position->positionType->name ?? '-' }}</td>
                <td>{{ $person->is_active ? 'Aktif' : 'Non-Aktif' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        window.onafterprint = function() {

        };
    </script>
</body>
</html>