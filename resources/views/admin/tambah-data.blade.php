@extends('layouts.sidebar-admin')
@section('title', 'Tambah Data Dosen')

@section('content')
    <h1 class="font-poppins text-3xl font-bold">Identitas Dosen</h1>

    <form action="{{ url('/admin/tambah-data') }}" class="font-poppins flex gap-12 mt-4" method="post" enctype="multipart/form-data">
        @csrf
        {{-- aku mau menerima message dari validation maupun message kalau datanya berhasil di tambahkan --}}

            <!-- message berhasil -->
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <!-- erorr message -->
        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif  

        <div class="w-1/2">
            {{-- Nama Lengkap --}}
            <x-textField id="name" label="Nama Lengkap" name="name" type="text" placeholder="Masukan Nama Lengkap..." value="{{ old('name') }}" class=""/>
            {{-- NIP --}}
            <x-textField id="nip" label="NIP" name="nip" type="text" placeholder="Masukan NIP..." value="{{ old('nip') }}" class="mr-4"/>
            {{-- Gender --}}
            <label class="font-medium text-xl" for="gender">Jenis Kelamin</label><br>
            <select class="w-full " name="gender" required>
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
        </div>
        <div class="w-1/2">
            {{-- Email --}}

            
            {{-- Simpan Foto --}}
            <div class="form-group my-2">
                <label for="image">Foto</label><br>
                <input type="file" name="image" id="image" class="form-controller @error('photo')
                is-invalid
                @enderror">
            </div>
    
            {{-- Is Active --}}
            <label>
                <input type="checkbox" name="is_active" value="1" checked>
                Aktif?, KALAU AKTIF DI CENTANG AJA
            </label>
            <br><br>
    
            <button type="submit">Simpan Data</button>
        </div>

        {{-- Tempat Lahir --}}


    </form>
@endsection

