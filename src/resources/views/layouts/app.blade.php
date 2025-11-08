<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/' . ($css ?? 'index') . '.css') }}">
</head>
<body>
    <header>
        <h1>お問い合わせフォーム</h1>
        @auth
        <div class="logout">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">ログアウト</button>
            </form>
        </div>
        @endauth
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>© 2025 お問い合わせフォーム</p>
    </footer>
</body>
</html>
