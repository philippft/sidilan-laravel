@extends('layouts.sidebar-admin')
@section('content')
<div>
    <h1 class='font-bold text-4xl'>Tambah Data</h1>

    <!-- div form -->
    <form action="{{ url('/admin/tambah-data')}}" method="post"  enctype="multipart/form-data" >
        <!-- div parent -->
        <div class="flex gap-12 mt-4">
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

            <!-- field kiri -->
            <div class="w-3/4 h-full">

                <!-- Full Name -->
                    <x-textField label="Nama Lengkap" type="text" name="full_name" id="full_name" placeholder="Masukkan Nama Lengkap..." class="border-abu-sidilan focus:ring-2 focus:ring-dongker-sidilan transition-all h-10 md:h-14 mb-4 rounded-md md:rounded-xl">
                        <!-- <label for="full_name" class="text-xl font-medium">Nama Lengkap</label> -->
                    </x-textield>
                
                <!-- NIP -->
                    <x-textField label="NIP" type="text" name="nip" id="nip" placeholder="Masukkan NIP..." class="border-abu-sidilan focus:ring-2 focus:ring-dongker-sidilan transition-all h-10 mb-4 md:h-14 rounded-md md:rounded-xl">
                        <!-- <label for="nip" class="text-xl font-medium">NIP</label> -->
                    </x-textField>
    
                <!-- jenis kelamin -->
                <x-custom-select id="gender" name="gender" label="Jenis Kelamin" :value="$person->gender ?? ''" :options="['laki-laki' => 'Laki-laki', 'perempuan' => 'Perempuan']" />

                <!-- pendidikan -->
                <x-custom-select id="education_id" name="education_id" label="Pendidikan" :value="$person->education_id ?? ''" :options="$educations->pluck('name', 'id')->toArray()" />

                <!-- jabatan -->
                <x-custom-select id="position_id" name="position_id" label="Jabatan" :value="$person->position_id ?? ''" :options="$positions->pluck('name', 'id')->toArray()" />

                <!-- jenis -->
                <x-custom-select id="position_type_id" name="position_type_id" label="Tipe Jabatan" :value="$person->position_type_id ?? ''"
                    :options="$positionTypes->pluck('name', 'id')->toArray()" />
                
            </div>

            <!-- field kanan -->
            <!-- div foto -->
            <div class="w-1/2 flex flex-col justify-between">
                <!-- Tambah Foto -->
                <!-- <div class="items-center justify-center w-full">
                    foto field -->
                    <!-- <div class="">
                        <img :src="imageUrl" alt="Preview Foto" class="bg-warning w-52 h-52 rounded-xl object-cover mx-auto mb-4" id="preview-image">
                    </div> -->
                    <!-- input file -->
                    <!-- <x-input-file id="tambah-foto" 
                        name="foto" 
                        type="file" 
                        accept="image/*"
                        @change="fileChosen($event)">Pilih File</x-input>
                </div>  -->

                <!-- field foto -->
                <div class="flex flex-col gap-2">
                    <x-input-files name="image" label="Pilih Foto" id="image" :value="$person->image ?? null"/>
                    <x-status :person/>
                </div>

                <!-- tombol-tombol -->
                <div class="flex flex-col gap-2">
                    <x-button class="w-full h-16 bg-success rounded-xl text-white font-bold text-2xl" type="submit">Simpan Data</x-button>
                    <a class="block w-full py-4 text-center font-bold text-2xl text-white rounded-xl cursor-pointer transition-all shadow-md bg-danger hover:bg-[#cf4c4c]" href="{{ url('admin/dashboard') }}">Batal</a>
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
    
            </div>
            
            
        </div>

            
        


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
    </form>    
</div>
@endsection
