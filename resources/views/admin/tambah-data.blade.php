@extends('layouts.sidebar-admin')
@section('title', 'Tambah Data Dosen')
@section('content')
   <div>
      <x-text-header class="text-center" />

      <form class="mt-3" action="{{ url('/admin/tambah-data') }}" method="post" enctype="multipart/form-data">
         @csrf

         <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">

            <div class="w-full lg:w-1/2 flex flex-col justify-between order-1 lg:order-2">
               <div class="flex flex-col gap-4">
                  <x-input-files name="image" label="Pilih Foto" id="image" :value="$person->image ?? null" />
                  <x-status :person="$person ?? null" />
               </div>

               <div class="hidden lg:flex flex-col gap-2 mt-0">
                  <x-button class="w-full h-16 bg-success rounded-lg text-white font-bold text-2xl" type="submit">
                     Simpan Data
                  </x-button>
                  <a class="block w-full py-4 text-center font-bold text-2xl text-white rounded-lg bg-danger hover:bg-[#cf4c4c]"
                     href="{{ url('admin/dashboard') }}">
                     Batal
                  </a>
               </div>
            </div>

            <div class="w-full lg:w-1/2 order-2 lg:order-1">
               <div class="flex flex-col justify-between">
                  <x-textField label="Nama Lengkap" type="text" name="full_name" id="full_name"
                     placeholder="Masukkan Nama Lengkap..." />
                  <x-textField label="NIP" type="text" name="nip" id="nip" placeholder="Masukkan NIP..." />
                  <x-custom-select id="gender" name="gender" label="Jenis Kelamin" :value="$person->gender ?? ''"
                     :options="['laki-laki' => 'Laki-laki', 'perempuan' => 'Perempuan']" />
                  <x-custom-select id="education_id" name="education_id" label="Pendidikan" :value="$person->education_id ?? ''"
                     :options="$educations->pluck('name', 'id')->toArray()" />
                  <x-custom-select id="position_id" name="position_id" label="Jabatan" :value="$person->position_id ?? ''"
                     :options="$positions->pluck('name', 'id')->toArray()" />
                  <x-custom-select id="position_type_id" name="position_type_id" label="Tipe Jabatan" :value="$person->position_type_id ?? ''"
                     :options="$positionTypes->pluck('name', 'id')->toArray()" />
               </div>

               <div class="flex lg:hidden flex-col gap-4 lg:gap-2 mt-4 mb-0">
                  <x-button
                     class="w-full lg:py-4 py-2 bg-success rounded-md text-white lg:font-bold font-semibold text-base lg:text-2xl"
                     type="submit">
                     Simpan Data
                  </x-button>
                  <a class="block w-full lg:py-4 py-2 text-center lg:font-bold font-semibold lg:text-2xl text-base text-white rounded-md bg-danger"
                     href="{{ url('admin/dashboard') }}">
                     Batal
                  </a>
               </div>
            </div>

         </div>
      </form>
   </div>
@endsection
