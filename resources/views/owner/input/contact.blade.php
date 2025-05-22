<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/owner/input/contact.css') }}">

    <link rel="icon" href="{{ asset('logoku.png') }}" type="image/png">

    <title>Tambah Kontak</title>
</head>

<body>
    <div id="container">
        <div id="box">
            <h1>Tambah Kontak</h1>

            @if ($errors->any())
                <div>
                    @foreach ($errors->all() as $error)
                        <p class="error">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('contactShowCreate') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="textBox">
                    <input type="text" name="name" placeholder="Masukkan nama media sosial" value="{{ old('name') }}">
                </div>
                <div class="textBox">
                    <input type="file" name="image">
                </div>
                <div class="textBox">
                    <input type="text" name="link" placeholder="Masukkan link kontak" value="{{ old('link') }}">
                </div>

                <button type="submit" class="tombol">Simpan</button>
            </form>
        </div>
    </div>
</body>

</html>