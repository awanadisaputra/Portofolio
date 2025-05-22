@extends('owner.home.layout')

@section('title', 'Skill')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/owner/home/skill.css') }}">
@endpush

@section('content')
    <div id="container">
        <div id="header">
            <h1>Daftar Skill</h1>
            <a href="{{ route('skillShowCreate') }}" id="tombolTambah">Tambah</a>
        </div>

        <div id="list">
            @foreach ($skills as $skill)
                <a href="{{ route('skillShowUpdate', $skill->id) }}" id="card-link">
                    <div id="card">
                        <img src="{{ asset('storage/' . $skill->image) }}" alt="{{ $skill->name }}" class="card-img">
                        <h3>{{ $skill->name }}</h3>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection