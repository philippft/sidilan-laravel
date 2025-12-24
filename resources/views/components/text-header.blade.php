<h1 {{ $attributes->merge(['class' => "text-3xl font-bold mb-4"]) }}>
    @switch(Route::currentRouteName())
        @case('admin.dashboard')
            Dashboard
            @break
        @case('admin.tambah.*')
            Identitas Dosen
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