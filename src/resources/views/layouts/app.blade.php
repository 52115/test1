<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ | FashionablyLate</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">

    {{-- ページ固有のCSSは各Bladeで<link>記述済み --}}
    <style>
        body {
            font-family: 'Noto Sans JP', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
            color: #4b3f32;
        }

        header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid #ddd;
        }

        header h1 {
            font-size: 28px;
            font-weight: 700;
            color: #4b3f32;
            margin: 0;
        }

        main {
            padding: 30px 0;
        }

        footer {
            text-align: center;
            padding: 15px 0;
            margin-top: 50px;
            font-size: 12px;
            color: #999;
            border-top: 1px solid #eee;
        }

        .error {
            text-align: left;
            color: red;
            font-size: 15px;
        }
    </style>
</head>
<body>
    <header>
        <h1>FashionablyLate</h1>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} FashionablyLate. All Rights Reserved.
    </footer>
</body>
</html>
