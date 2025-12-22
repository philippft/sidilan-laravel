@extends('layouts.main-layout')
@section('title', 'Dashboard')

@section('content')
<x-search-bar placeholder="Cari surat..." />

<div id="search-result">
    @include('admin.surat.partials.table', ['data' => $data])
</div>

@endsection