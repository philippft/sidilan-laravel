<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Tenaga Pendidik dan Laboran</title>
</head>
<body>
    <h1>Data Tenaga Pendidik dan Laboran</h1>
    <p>Berikut adalah data seluruh tenaga pendidik dan laboran:</p>

    <form method="GET" action="">
        <input type="text" name="search" placeholder="Cari nama atau NIP..." value="{{ request('search') }}">
        <button type="submit">Cari</button>
        @if(request('search'))
            <a href="{{ route('staff.index') }}">Clear</a>
        @endif
    </form>

    <br>
    <!-- Table untuk menampilkan data persons -->
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>NIP</th>
                <th>Jenis Kelamin</th>
                <th>Pendidikan</th>
                <th>Posisi</th>
                <th>Jenis Pegawai</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($persons as $person)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $person->full_name }}</td>
                <td>{{ $person->nip }}</td>
                <td>{{ $person->gender }}</td>
                <td>{{ $person->education->name ?? '-' }}</td>
                <td>{{ $person->position->name ?? '-' }}</td>
                <td>{{ $person->position_type->name ?? '-' }}</td>
                <td>{{ $person->is_active ? 'Aktif' : 'Tidak Aktif' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Jika data kosong -->
    @if($persons->count() == 0)
    <p>Belum ada data tendik atau laboran.</p>
    @endif

    <br>
    <div>
        <p><strong>Total Data:</strong> {{ $persons->count() }} orang</p>
        <p><strong>Yang Aktif:</strong> {{ $persons->where('is_active', true)->count() }} orang</p>
        <p><strong>Yang Tidak Aktif:</strong> {{ $persons->where('is_active', false)->count() }} orang</p>
    </div>
</body>
</html>