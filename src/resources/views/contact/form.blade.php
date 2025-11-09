@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/form.css') }}">

<div class="contact-container">
    <h1>Contact</h1>

    <form action="{{ route('contact.confirm') }}" method="post">
        @csrf

        <div class="form-group">
            <label>お名前 <span class="required">※</span></label>
            <div class="name-inputs">
                <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="例）山田">
                <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="例）太郎">
            </div>
        </div>
        <div class="error">
            @error('last_name'){{ $message }}@enderror
            @error('first_name'){{ $message }}@enderror
        </div>

        <div class="form-group">
            <label>性別 <span class="required">※</span></label>
            <div class="radio-group">
                <label><input type="radio" name="gender" value="男性" {{ old('gender')=='男性'?'checked':'' }}>男性</label>
                <label><input type="radio" name="gender" value="女性" {{ old('gender')=='女性'?'checked':'' }}>女性</label>
                <label><input type="radio" name="gender" value="その他" {{ old('gender')=='その他'?'checked':'' }}>その他</label>
            </div>
        </div>
        <div class="error">
            @error('gender'){{ $message }}@enderror
        </div>

        <div class="form-group">
            <label>メールアドレス <span class="required">※</span></label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="例）test@example.com">
        </div>
        <div class="error">
            @error('email'){{ $message }}@enderror
        </div>

        <div class="form-group">
            <label>電話番号 <span class="required">※</span></label>
            <div class="tel-inputs">
                <input type="text" name="tel1" value="{{ old('tel1') }}" maxlength="5"> -
                <input type="text" name="tel2" value="{{ old('tel2') }}" maxlength="5"> -
                <input type="text" name="tel3" value="{{ old('tel3') }}" maxlength="5">
            </div>
        </div>
        <div class="error">
            @error('tel1'){{ $message }}@enderror
        </div>

        <div class="form-group">
            <label>住所 <span class="required">※</span></label>
            <input type="text" name="address" value="{{ old('address') }}" placeholder="例）東京都渋谷区千駄ヶ谷1-2-3">
        </div>
        <div class="error">
            @error('address'){{ $message }}@enderror
        </div>

        <div class="form-group">
            <label>建物名</label>
            <input type="text" name="building" value="{{ old('building') }}" placeholder="例）千駄ヶ谷マンション101">
        </div>

        <div class="form-group">
            <label>お問い合わせの種類 <span class="required">※</span></label>
            <select name="category_id">
                <option value="">選択してください</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id')==$category->id?'selected':'' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="error">
            @error('category_id'){{ $message }}@enderror
        </div>

        <div class="form-group">
            <label>お問い合わせ内容 <span class="required">※</span></label>
            <textarea name="content" rows="4" placeholder="お問い合わせ内容を入力してください">{{ old('content') }}</textarea>
        </div>
        <div class="error">
            @error('content'){{ $message }}@enderror
        </div>

        <div class="btn-area">
            <button type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection