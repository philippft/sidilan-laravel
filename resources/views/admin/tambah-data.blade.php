<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Person</title>
</head>
<body>
    <h1>Tambah Data Person</h1>

    <form action="{{ url('/admin/tambah-data') }}" method="post" enctype="multipart/form-data">
        @csrf

        {{-- Full Name --}}
        <label for="full_name">Nama Lengkap</label><br>
        <input type="text" name="full_name" placeholder="Nama Lengkap..." required><br><br>

        {{-- NIP --}}
        <label for="nip">NIP</label><br>
        <input type="text" name="nip" placeholder="Masukan NIP..." required><br><br>

        {{-- Gender --}}
        <label for="gender">Jenis Kelamin</label><br>
        <select name="gender" required>
            <option value="">-- Pilih Gender --</option>
            <option value="laki-laki">Laki-laki</option>
            <option value="perempuan">Perempuan</option>
        </select><br><br>

        {{-- Education --}}
        <label for="education_id">Pendidikan</label><br>
        <select name="education_id" required>
            <option value="">-- Pilih Pendidikan --</option>

            {{-- Loop dari database --}}
            @foreach($educations as $education)
                <option value="{{ $education->id }}">{{ $education->name }}</option>
            @endforeach
        </select><br><br>

        {{-- Position --}}
        <label for="position_id">Jabatan</label><br>
        <select name="position_id" required>
            <option value="">-- Pilih Jabatan --</option>
            @foreach($positions as $position)
                <option value="{{ $position->id }}">{{ $position->name }}</option>
            @endforeach
        </select><br><br>

        {{-- Position Type --}}
        <label for="position_type_id">Tipe Jabatan</label><br>
        <select name="position_type_id" required>
            <option value="">-- Pilih Tipe Jabatan --</option>
            @foreach($positionTypes as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select><br><br>

        {{-- Simpan Foto --}}
        <div class="form-group my-2">
            <label for="image">Foto</label><br>
            <input type="file" name="image" id="image" class="form-controller @error('photo')
            is-invalid
            @enderror">
        </div>

        {{-- Is Active --}}
        <label>
            <input type="checkbox" name="is_active" checked>
            Aktif?, KALAU AKTIF DI CENTANG AJA
        </label>
        <br><br>

        <button type="submit">Simpan Data</button>
    </form>
</body>
</html>
