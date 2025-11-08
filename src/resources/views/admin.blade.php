@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<div class="admin-container">
    <h1>お問い合わせ管理</h1>

    <form method="GET" action="{{ route('admin.index') }}" class="search-form">
        <input type="text" name="keyword" placeholder="名前またはメールアドレスで検索" value="{{ request('keyword') }}">
        <button type="submit">検索</button>
    </form>

    <table class="contact-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>メール</th>
                <th>内容</th>
                <th>日時</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->message }}</td>
                <td>{{ $contact->created_at->format('Y-m-d H:i') }}</td>
                <td>
                    <form action="{{ route('admin.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('削除しますか？');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination-container">
        {{ $contacts->links() }}
    </div>

    <a href="{{ route('admin.export') }}" class="export-btn">CSVエクスポート</a>
</div>
@endsection
