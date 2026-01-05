@extends('layouts.sidebar-admin')
@section('title', 'Manajemen Data')

@section('content')
   <div x-data="{
       showModal: false,
       deleteUrl: '',
       dataPerson: ''
   }" class="h-full flex flex-col gap-0">
      <x-text-header />
      <x-search-bar class="mb-4 flex-1" />

      <div class="overflow-x-auto rounded-xl bg-white shadow-md no-scrollbar">
         <table class="min-w-[800px] lg:w-full overflow-hidden whitespace-nowrap table-fixed">
            <thead class="bg-dongker-sidilan text-white">
               <tr>
                  <x-th class="px-2 w-[5%]">No</x-th>
                  <x-th class="text-left w-[20%]">Nama Lengkap</x-th>
                  <x-th class="text-left w-[40%]">Jabatan</x-th>
                  <x-th class="w-[10%] text-center">Status</x-th>
                  <x-th class="text-center w-[10%]">Aksi</x-th>
               </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
               @forelse ($persons as $person)
                  <tr id="row-{{ $person->id }}" class="hover:bg-gray-50 transition-colors">
                     <x-td class="text-center">{{ $loop->iteration }}</x-td>
                     <x-td class="font-medium text-gray-900 whitespace-normal leading-snug">{{ $person->full_name }}</x-td>
                     <x-td class="whitespace-normal leading-snug">{{ $person->position->name ?? '-' }}</x-td>
                     <x-td class="text-center">
                        <span
                           class="px-3 py-1 rounded-full text-xs {{ $person->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                           {{ $person->is_active ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                     </x-td>
                     <x-td>
                        <div class="flex gap-4 justify-center items-center">
                           <a href="{{ route('admin.edit', $person->id) }}"
                              class="p-2.5 bg-dongker-sidilan rounded-lg text-white hover:opacity-90">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="white" class="size-5">
                                 <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                              </svg>
                           </a>
                           <button type="button" class="p-2.5 bg-orange-sidilan rounded-md hover:opacity-90"
                              @click="
                                 showModal = true;
                                 deleteUrl = '{{ route('admin.delete', $person->id) }}';
                                 dataPerson = '{{ $person->full_name }}';
                              ">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="white" class="size-5">
                                 <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                              </svg>
                           </button>
                        </div>
                     </x-td>
                  </tr>
               @empty
                  <tr>
                     <x-td colspan="5" class="text-center font-bold py-8 text-gray-500">
                        Tidak ada data tersedia!
                     </x-td>
                  </tr>
               @endforelse
            </tbody>
         </table>
      </div>
      <x-pagination :data="$persons" />
      <x-modal-box />
   </div>
@endsection
