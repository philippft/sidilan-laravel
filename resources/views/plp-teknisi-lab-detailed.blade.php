@extends('layouts.main-layout')
@section('title', 'Tenaga Pendidik Detail Info')

@section('content')

<h1>Detail Info Dari: </h1>
<h2>Nama: {{ $detailPerson->full_name }}</h2>
<p>NIP: {{ $detailPerson->nip }}</p>
<p>Pendidikan: {{ $detailPerson->education->name }}</p>
<p>Jabatan: {{ $detailPerson->position->name }}</p>

@endsection