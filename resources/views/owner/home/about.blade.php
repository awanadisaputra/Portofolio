@extends('owner.home.layout')

@section('title', 'About')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/owner/home/about.css') }}">
@endpush

@section('content')
    <div id="container">
        <div id="box">
            <h1>About</h1>

            @if (session('success'))
                <div id="ifSuccess">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div id="ifFalse">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('aboutUpdate') }}" method="post">
                @csrf
                <div id="textBox">
                    <textarea name="description" rows="10"
                        placeholder="Masukkan....">{{ old('description', $about->description ?? '') }}</textarea>
                </div>
                <button type="submit">Simpan</button>
            </form>
        </div>
    </div>

@endsection