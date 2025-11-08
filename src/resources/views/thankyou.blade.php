<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>送信完了</title>
  <link rel="stylesheet" href="{{ asset('css/thankyou.css') }}">
</head>
<body>
  <p>お問い合わせありがとうございました。</p>
  <form action="{{ route('contact.index') }}" method="get">
    <button type="submit">トップに戻る</button>
  </form>
</body>
</html>
