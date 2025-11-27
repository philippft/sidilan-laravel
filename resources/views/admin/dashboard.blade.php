<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Page</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-sidebar></x-sidebar>

    <!-- Table untuk menampilkan data persons -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama Lengkap</th>
                <th>NIP</th>
                <th>Jenis Kelamin</th>
                <th>Pendidikan</th>
                <th>Posisi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($persons as $person)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @if($person->image)
                        <img src="{{ asset('storage/person_images/' . $person->image) }}" 
                             alt="{{ $person->full_name }}" 
                             width="50" height="50"
                             style="border-radius: 50%; object-fit: cover;">
                    @else
                        <div>[No Image]</div>
                    @endif
                </td>
                <td>{{ $person->full_name }}</td>
                <td>{{ $person->nip }}</td>
                <td>{{ $person->gender }}</td>
                <td>{{ $person->education->name ?? '-' }}</td>
                <td>{{ $person->position->name ?? '-' }}</td>
                <td>{{ $person->is_active ? 'Aktif' : 'Tidak Aktif' }}</td>
                <td>
                    <!-- EDIT - Pakai LINK (GET) -->
                    <a href="{{ route('admin.edit', $person->id) }}">
                        <button type="button">
                            Edit
                        </button>
                    </a>

                    <!-- DELETE - Pakai FORM (DELETE) -->
                    <form action="{{ route('admin.delete', $person->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                onclick="return confirm('Yakin ingin menghapus {{ $person->full_name }}?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Jika data kosong -->
    @if($persons->count() == 0)
    <p style="text-align: center; margin-top: 20px; color: #666;">
        Belum ada data tendik atau laboran.
    </p>
    @endif
</body>
</html>