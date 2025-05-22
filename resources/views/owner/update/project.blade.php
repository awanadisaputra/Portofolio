<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/owner/update/project.css') }}">

    <link rel="icon" href="{{ asset('logoku.png') }}" type="image/png">

    <title>Update Project</title>
</head>

<body>
    <div id="container">
        <div id="box">
            <h1>Update Project</h1>

            @if ($errors->any())
                <div id="error">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('projectShowUpdate', $project->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="textBox">
                    <input type="text" name="title" placeholder="Judul" value="{{ $project->title }}">
                </div>
                <div class="textBox">
                    <input type="file" name="image" placeholder="Gambar">
                </div>
                <div class="textBox">
                    <input type="text" name="link" placeholder="Link" value="{{ $project->link }}">
                </div>
                <div class="textBox">
                    <textarea name="description" id="" rows="5">{{ $project->description }}</textarea>
                </div>

                <button type="submit" id="tombolSimpan">Simpan</button>
            </form>
            <form action="{{ route('projectDelete', $project->id) }}" method="post"
                onsubmit="return confirm('Yakin ingin menghapus project ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" id="tombolHapus">Hapus</button>
            </form>
        </div>
    </div>
</body>

</html>