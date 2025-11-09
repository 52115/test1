@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">

<div class="thanks-container">
    <p>お問い合わせありがとうございました</p>
    <div class="btn-area">
        <a href="{{ route('contact.form') }}">HOME</a>
    </div>
</div>
@endsection
