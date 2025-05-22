<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<link rel=" preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/owner/auth/login.css') }}">

    <link rel="icon" href="{{ asset('logoku.png') }}" type="image/png">

    <title>Login</title>
</head>

<body>
    <div id="container">
        <div id="box">
            <h1>Login</h1>

            @if ($errors->any())
                <div style="color:red;">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ url('log-in') }}" method="POST">
                @csrf
                <div class="textBox">
                    <input type="text" placeholder="Username" name="username" id="username" required>
                </div>
                <div class="textBox">
                    <input type="password" placeholder="Password" name="password" id="password" required>
                </div>
                <button type="submit" id="button">Login</button>
            </form>
        </div>
    </div>
</body>

</html>