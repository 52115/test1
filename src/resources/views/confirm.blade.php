<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>内容確認</title>
  <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
</head>
<body>
  <header>お問い合わせ内容の確認</header>

  <h2>以下の内容で送信しますか？</h2>

  <form action="{{ route('contact.store') }}" method="post">
    @csrf

    <table>
      <tr><th>お名前</th><td>{{ $inputs['name'] }}</td></tr>
      <tr><th>メールアドレス</th><td>{{ $inputs['email'] }}</td></tr>
      <tr><th>性別</th><td>{{ $inputs['gender'] }}</td></tr>
      <tr><th>お問い合わせの種類</th><td>{{ $category->content }}</td></tr>
      <tr><th>お問い合わせ内容</th><td>{!! nl2br(e($inputs['detail'])) !!}</td></tr>
    </table>

    <button type="submit" name="action" value="submit">送信</button>
    <button type="submit" name="action" value="back">修正</button>
  </form>
</body>
</html>
