@extends('owner.home.layout')

@section('title', 'Home')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/owner/home/home.css') }}">
@endpush

@section('content')
    <div class="container">
        <div class="boxAtas">
            <h1>Selamat Datang <span class="nama">Awan Adi</span></h1>
            <p>Belajar untuk menjadi FullStack.</p>
        </div>

        <div class="box_bawah">
            <h2>List yang harus dipelajari</h2>
            <div class="list">
                <div class="card">
                    <h3>Laravel</h3>
                    <p>Belajar wajib</p>
                </div>
                <div class="card">
                    <h3>React.js</h3>
                    <p>Wajib dipelajari(belum dipelajari)</p>
                </div>
                <div class="card">
                    <h3>Tailwind CSS</h3>
                    <p>Wajib dipelajari(belum dipelajari)</p>
                </div>
            </div>
        </div>
    </div>
@endsection