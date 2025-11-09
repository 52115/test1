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
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;   /* h1を中央に配置 */
            padding: 20px 0;
            border-bottom: 1px solid #ddd;
        }

        header h1 {
            font-size: 28px;
            font-weight: 700;
            color: #4b3f32;
            margin: 0;
        }

        header .btn-link {
            position: absolute;
            right: 20px;               /* 右端から20px */
            background-color: #d3af8d;
            color: white;
            padding: 8px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.75rem;
            transition: background-color 0.3s;
        }

        .btn-link:hover {
            background-color: #7b6652;
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
        <a href="{{ route('register') }}" class="btn-link">新規登録</a>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} FashionablyLate. All Rights Reserved.
    </footer>
</body>
</html>
