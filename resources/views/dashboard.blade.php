@extends('layouts.main-layout')
@section('title', 'Dashboard')

@section('content')
   <div class="flex w-full gap-4">


      <x-card-box class="w-full">

         tess
      </x-card-box>
      <x-card-box class="w-full">

         tess
      </x-card-box>
      <x-card-box class="w-full">

         tess
      </x-card-box>
      <x-card-box class="w-full">

         tess
      </x-card-box>

      {{-- <form method="GET" action="">
         <input type="text" name="search" placeholder="Cari nama atau NIP..."">
         <button type="submit">Cari</button>
         @if (request('search'))
         <a href="">Clear</a>
         @endif
      </form> --}}

      {{-- <br> --}}
      <!-- Table untuk menampilkan data persons -->
      {{-- <table border="1">
         <thead>
            <tr>
               <th>No</th>
               <th>Foto</th>
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

         </tbody>
      </table> --}}
   </div>

   <!-- Jika data kosong -->
   {{-- <p>Belum ada data tendik atau laboran.</p> --}}
@endsection
