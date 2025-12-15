<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Person</title>
</head>
<body>
    <h1>Edit Data Person</h1>

    <form action="{{ route('admin.edit.post', $person->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Full Name --}}
        <label for="full_name">Nama Lengkap</label><br>
        <input type="text" name="full_name" value="{{ $person->full_name }}" placeholder="Nama Lengkap..." required><br><br>

        {{-- NIP --}}
        <label for="nip">NIP</label><br>
        <input type="text" name="nip" value="{{ $person->nip }}" placeholder="Masukan NIP..." required><br><br>

        {{-- Gender --}}
        <label for="gender">Jenis Kelamin</label><br>
        <select name="gender" required>
            <option value="">-- Pilih Gender --</option>
            <option value="laki-laki" {{ $person->gender == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="perempuan" {{ $person->gender == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select><br><br>

        {{-- Education --}}
        <label for="education_id">Pendidikan</label><br>
        <select name="education_id" required>
            <option value="">-- Pilih Pendidikan --</option>
            @foreach($educations as $education)
                <option value="{{ $education->id }}" {{ $person->education_id == $education->id ? 'selected' : '' }}>
                    {{ $education->name }}
                </option>
            @endforeach
        </select><br><br>

        {{-- Position --}}
        <label for="position_id">Jabatan</label><br>
        <select name="position_id" required>
            <option value="">-- Pilih Jabatan --</option>
            @foreach($positions as $position)
                <option value="{{ $position->id }}" {{ $person->position_id == $position->id ? 'selected' : '' }}>
                    {{ $position->name }}
                </option>
            @endforeach
        </select><br><br>

        {{-- Position Type --}}
        <label for="position_type_id">Tipe Jabatan</label><br>
        <select name="position_type_id" required>
            <option value="">-- Pilih Tipe Jabatan --</option>
            @foreach($positionTypes as $type)
                <option value="{{ $type->id }}" {{ $person->position_type_id == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
            @endforeach
        </select><br><br>

        {{-- Foto --}}
        <div class="form-group my-2">
            <label for="image">Foto</label><br>
            @if($person->image)
                <p>Foto saat ini: {{ $person->image }}</p>
            @endif
            <input type="file" name="image" id="image">
        </div>

        {{-- Is Active --}}
        <label>
            <input type="checkbox" name="is_active" value="1" {{ $person->is_active ? 'checked' : '' }}>
            Aktif?, KALAU AKTIF DI CENTANG AJA
        </label>
        <br><br>

        <button type="submit">Update Data</button>
    </form>
</body>
</html>