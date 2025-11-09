@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">

<div class="confirm-container">
    <h1>FashionablyLate</h1>
    <h2>Confirm</h2>

    <table class="confirm-table">
        <tr><th>お名前</th><td>{{ $data['last_name'] }} {{ $data['first_name'] }}</td></tr>
        <tr><th>性別</th><td>{{ $data['gender'] }}</td></tr>
        <tr><th>メールアドレス</th><td>{{ $data['email'] }}</td></tr>
        <tr><th>電話番号</th><td>{{ $data['tel1'] }}{{ $data['tel2'] }}{{ $data['tel3'] }}</td></tr>
        <tr><th>住所</th><td>{{ $data['address'] }}</td></tr>
        <tr><th>建物名</th><td>{{ $data['building'] }}</td></tr>
        <tr><th>お問い合わせの種類</th><td>{{ $data['category_name'] }}</td></tr>
        <tr><th>お問い合わせ内容</th><td>{{ $data['content'] }}</td></tr>
    </table>

    <form method="post" action="{{ route('contact.store') }}">
        @csrf
        @foreach ($data as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach

        <div class="btn-area">
            <button type="submit" name="send">送信</button>
            <button type="submit" name="back">修正</button>
        </div>
    </form>
</div>
@endsection