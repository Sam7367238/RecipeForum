@props(["title" => "Website"])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    @session('status')
        <p>{{ session("status") }}</p>
    @endsession

    <nav>
        @guest
            <a href="{{ route('register') }}">Register</a>
            <a href="{{ route('login') }}">Login</a>
        @endguest

        @auth
            <form method="POST" action="{{ route('session.destroy') }}">
                @method("DELETE")
                @csrf

                <input type="submit" value="Logout">
            </form>
        @endauth
    </nav>

    {{ $slot }}
</body>
</html>