<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/owner/home/layout.css') }}">

    @stack('styles')

    <link rel="icon" href="{{ asset('logoku.png') }}" type="image/png">

    <title>Home</title>
</head>

<body>
    <nav id="navbar">
        <h1 id="nama">Brand</h1>
        <ul id="poin_navbar">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/project">Project</a></li>
            <li><a href="/skill">Skill</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
        <hr>
        <ul id="logout">
            <li><a href="{{ route('logout') }}">Logout</a></li>
        </ul>
    </nav>

    <div id="content">
        @yield('content')
    </div>

    <script>
        window.onload = function () {
            const links = document.querySelectorAll('#poin_navbar a');
            links.forEach(link => {
                if (link.href === window.location.href) {
                    link.classList.add('active');
                }
            });
        };
    </script>
</body>

</html>