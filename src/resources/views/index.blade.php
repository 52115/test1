<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>お問い合わせ</title>
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
  <header>お問い合わせフォーム</header>

  <h2>お問い合わせ内容をご入力ください</h2>

  <form action="{{ route('contact.confirm') }}" method="post">
    @csrf

    <div class="form-group">
      <label class="form-label">お名前</label>
      <div class="form-input">
        <input type="text" name="name" value="{{ old('name') }}" required>
      </div>
    </div>

    <div class="form-group">
      <label class="form-label">メールアドレス</label>
      <div class="form-input">
        <input type="email" name="email" value="{{ old('email') }}" required>
      </div>
    </div>

    <div class="form-group">
      <label class="form-label">性別</label>
      <div class="form-input">
        <input type="radio" name="gender" value="男性" checked> 男性
        <input type="radio" name="gender" value="女性"> 女性
      </div>
    </div>

    <div class="form-group">
      <label class="form-label">お問い合わせの種類</label>
      <div class="form-input">
        <select name="category_id" required>
          <option value="">選択してください</option>
          @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->content }}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="form-label">お問い合わせ内容</label>
      <div class="form-input">
        <textarea name="detail" required>{{ old('detail') }}</textarea>
      </div>
    </div>

    <button type="submit">確認画面へ</button>
  </form>
</body>
</html>
