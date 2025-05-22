@extends('owner.home.layout')

@section('title', 'Project')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/owner/home/project.css') }}">
@endpush

@section('content')
    <div id="container">
        <div id="header">
            <h1>Daftar Project</h1>
            <a href="{{ route('projectShowCreate') }}" id="tombolTambah">Tambah</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Link</th>
                    <th>Descripri</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr id="update" onclick="window.location = '{{ route('projectShowUpdate', $project->id) }}'">
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->title }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $project->image) }}" alt="Image">
                        </td>
                        <td>{{ $project->link }}</td>
                        <td>{{ $project->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection