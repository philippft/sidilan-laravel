@extends('layouts.sidebar-admin')
@section('title', 'Edit Data Dosen')
@section('content')
   <x-text-header />

   <form class="flex gap-12" action="{{ route('admin.edit.post', $person->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="w-1/2 h-full flex flex-col justify-between">
         {{-- Input Text --}}
         <x-textField label="Nama Lengkap" type="text" name="full_name" id="full_name" placeholder="Masukkan Nama Lengkap..."
            value="{{ $person->full_name }}" />
         <x-textField label="NIP" type="text" name="nip" id="nip" placeholder="Masukkan NIP..."
            value="{{ $person->nip }}" />
         <x-custom-select id="gender" name="gender" label="Jenis Kelamin" :value="$person->gender ?? ''" :options="['laki-laki' => 'Laki-laki', 'perempuan' => 'Perempuan']" />
         <x-custom-select id="education_id" name="education_id" label="Pendidikan" :value="$person->education_id ?? ''" :options="$educations->pluck('name', 'id')->toArray()" />
         <x-custom-select id="position_id" name="position_id" label="Jabatan" :value="$person->position_id ?? ''" :options="$positions->pluck('name', 'id')->toArray()" />
         <div class="-mb-2">
            <x-custom-select id="position_type_id" name="position_type_id" label="Tipe Jabatan" :value="$person->position_type_id ?? ''"
            :options="$positionTypes->pluck('name', 'id')->toArray()" />
         </div>
      </div>
      <div class="w-1/2 flex flex-col justify-between">
         {{-- Input File --}}
        <div class="flex flex-col gap-2">
            <x-input-files 
                id="image" 
                name="image" 
                label="Pilih File" 
                :value="$person->image" 
            />
            <x-status :person="$person" />
        </div>
        <div class="flex flex-col gap-2">
            <x-button type="submit" class="cursor-pointer transition-all shadow-md active:scale-95 w-full py-4 hover:bg-[#20924f] bg-success font-bold text-2xl text-white text-center rounded-md">Simpan Data</x-button>
            <a class="block w-full py-4 text-center font-bold text-2xl text-white rounded-md cursor-pointer transition-all shadow-md bg-danger hover:bg-[#cf4c4c]" href="{{ url('admin/management-data') }}">Batal</a>   
        </div>  
      </div>
   </form>
@endsection
