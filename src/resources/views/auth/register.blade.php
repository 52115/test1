@extends('auth_layouts.register')

@section('content')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">

<div class="register-container">
    <h1 class="page-title">新規登録</h1>

    <form method="POST" action="{{ route('register') }}" class="register-form" novalidate>
        @csrf

        <div class="form-group">
            <label for="name">お名前 <span class="required">必須</span></label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
            @error('name')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">メールアドレス <span class="required">必須</span></label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">パスワード <span class="required">必須</span></label>
            <input id="password" type="password" name="password" required>
            @error('password')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">パスワード（確認）<span class="required">必須</span></label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn-register">登録</button>
        </div>
    </form>
</div>
@endsection
