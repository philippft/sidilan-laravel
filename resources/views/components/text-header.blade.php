<h1 {{ $attributes->merge(['class' => "block md:text-3xl font-bold md:text-left md:mb-4 mb-2"]) }}>
    @switch(Route::currentRouteName())
        @case('admin.dashboard')
            Dashboard
            @break
        @case('admin.tambah')
            Tambah Data
            @break
        @case('admin.edit')
            Edit Data
            @break
        @case('admin.management-data')
            Management Data
            @break
        @default
            Gagal Memuat Judul
    @endswitch
</h1>