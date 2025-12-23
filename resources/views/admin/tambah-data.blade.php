@extends('layouts.sidebar-admin')
@section('content')
<div>
    <h1 class='font-bold text-4xl'>Tambah Data</h1>

    <!-- div parent -->
    <div class="flex gap-12 mt-4">
        <!-- div form -->
        <form action="{{ url('/admin/tambah-data')}}" method="post"  enctype="multipart/form-data" class="w-3/4 h-full">
            @csrf

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

            
            <!-- Full Name -->
            <div class="mb-2">
                <x-text-field label="Nama Lengkap" type="text" name="full_name" id="full_name" placeholder="Masukkan Nama Lengkap..." class="border-abu-sidilan h-10 md:h-14 mt-2 rounded-md md:rounded-xl">
                    <!-- <label for="full_name" class="text-xl font-medium">Nama Lengkap</label> -->
                </x-text-field>
            </div>
            
            <!-- NIP -->
            <div class="mb-2">
                <x-text-field label="NIP" type="text" name="nip" id="nip" placeholder="Masukkan NIP..." class="border-abu-sidilan h-10 md:h-14 mt-2 rounded-md md:rounded-xl">
                    <!-- <label for="nip" class="text-xl font-medium">NIP</label> -->
                </x-text-field>
            </div>

            <!-- Pendidikan -->
            <div class="mb-2">
                <label for="full_name" class="text-xl font-medium">Pendidikan</label>
                <select name="position_id" 
                class="w-full h-[52px] bg-white border border-gray-300 text-gray-700 px-2 mt-2 rounded-lg leading-tight focus:outline-none focus:bg-white focus:ring-2 focus:ring-brand-dark focus:border-transparent cursor-pointer">
                    <option value="" disabled selected>Pilih Pendidikan</option>
                    
                    @foreach($educations as $education)
                        <option value="{{ $education->id }}">{{ $education->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Jenis Kelamin -->
            <div class="mb-2">
                <label for="full_name" class="text-xl font-medium">Jenis Kelamin</label>
                <select name="gender" 
                class="w-full h-[52px] bg-white border border-gray-300 text-gray-700 px-2 mt-2 rounded-lg leading-tight focus:outline-none focus:bg-white focus:ring-2 focus:ring-brand-dark focus:border-transparent cursor-pointer">
                    <option value="" disabled selected>Pilih Jenis Kelamin</option>

                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>

            </div>

            <!-- Jabatan -->
            <div class="mb-2">
                <label for="full_name" class="text-xl font-medium">Jabatan</label>
                <select name="position_id" 
                class="w-full h-[52px] bg-white border border-gray-300 text-gray-700 px-2 mt-2 rounded-lg leading-tight focus:outline-none focus:bg-white focus:ring-2 focus:ring-brand-dark focus:border-transparent cursor-pointer">
                    <option value="" disabled selected>Pilih Jabatan</option>

                    @foreach($positions as $position)
                        <option value="{{ $position->id }}">{{ $position->name }}</option>
                    @endforeach

                </select>

            </div>

            <!-- Jenis -->
            <div class="mb-2">
                <label for="full_name" class="text-xl font-medium">Jenis</label>
                <select name="position_type_id" 
                class="w-full h-[52px] bg-white border border-gray-300 text-gray-700 px-2 mt-2 rounded-lg leading-tight focus:outline-none focus:bg-white focus:ring-2 focus:ring-brand-dark focus:border-transparent cursor-pointer">
                    <option value="" disabled selected>Pilih Jenis</option>

                    @foreach($positionTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach

                </select>

            </div>
            
        </form>
        

        <!-- div foto -->
        <form class="w-1/2 flex flex-col justify-between">
            <!-- Tambah Foto -->
            <div class="items-center justify-center w-full">
                <!-- foto field -->
                <div class="">
                    
                    <img src="" alt="">
                    <img src="" alt="Preview Foto" class="bg-warning w-52 h-52 rounded-xl object-cover mx-auto mb-4" id="preview-image">

                     <!-- @if ($person->image)
                        <img src="{{ asset('storage/person_images/' . $person->image) }}" alt="{{ $person->full_name }}"
                           width="50" height="50" style="border-radius: 50%; object-fit: cover;">
                     @else
                        <div>[No Image]</div>
                     @endif -->
                </div>
                <!-- input file -->
                <x-input-file/>
            </div>

            <div class="block">
                <x-button class="w-full h-16 bg-success rounded-xl text-white font-bold text-2xl">Simpan Data</x-button>
                <x-button class="w-full h-16 mt-4 bg-danger rounded-xl text-white font-bold text-2xl">Batal</x-button>
            </div>
        

            <!-- {{-- Simpan Foto --}}
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

            <button type="submit">Simpan Data</button> -->

        </form>

    </div>

    <!-- <form action="{{ url('/admin/tambah-data') }}" method="post" enctype="multipart/form-data">
        @csrf
        {{-- aku mau menerima message dari validation maupun message kalau datanya berhasil di tambahkan --}} -->

        
        <!-- {{-- Full Name --}}
        <label for="full_name">Nama Lengkap</label><br>
        <input type="text" name="full_name" value="{{ old('full_name') }}" placeholder="Nama Lengkap..." required><br><br>

        {{-- NIP --}}
        <label for="nip">NIP</label><br>
        <input type="text" name="nip" value="{{ old('nip') }}" placeholder="Masukan NIP..." required><br><br>

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
        </select><br><br> -->

        
</div>
@endsection
