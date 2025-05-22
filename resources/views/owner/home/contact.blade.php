@extends('owner.home.layout')

@section('title', 'Contact')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/owner/home/contact.css') }}">
@endpush

@section('content')
    <div id="container">
        <div id="header">
            <h1>Daftar Kontak</h1>
            <a href="{{ route('contactShowCreate') }}" id="tombolTambah">Tambah</a>
        </div>

        <div id="list">
            @foreach ($contacts as $contact)
                <a href="{{ route('contactShowUpdate', $contact->id) }}" id="card-link">
                    <div id="card">
                        <img src="{{ asset('storage/' . $contact->image) }}" alt="{{ $contact->name }}" class="card-img">
                        <h3>{{ $contact->name }}</h3>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection