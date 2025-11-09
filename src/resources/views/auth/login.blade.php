@extends('auth_layouts.login')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<div class="login-container">
        <h1 class="page-title">ログイン</h1>

    <form method="POST" action="{{ route('login') }}" class="login-form" novalidate>
        @csrf

        <div class="form-group">
            <label for="email">メールアドレス <span class="required">必須</span></label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
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

        <div class="btn-group">
            <button type="submit" class="btn-login">ログイン</button>
        </div>
    </form>
</div>
@endsection

