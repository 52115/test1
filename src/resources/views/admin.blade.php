@extends('admin_layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<div class="admin-wrapper">
    <h1>Admin</h1>

    {{-- 成功メッセージ --}}
    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    {{-- 検索フォーム --}}
    <div class="admin-header">
        <form method="GET" action="{{ route('admin.index') }}" class="search-form">
            <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}">
            <select name="gender">
                <option value="">性別</option>
                <option value="1" @if(request('gender')==1) selected @endif>男性</option>
                <option value="2" @if(request('gender')==2) selected @endif>女性</option>
                <option value="3" @if(request('gender')==3) selected @endif>その他</option>
            </select>

            <select name="category_id">
                <option value="">お問い合わせの種類</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if(request('category_id')==$category->id) selected @endif>
                        {{ $category->content }}
                    </option>
                @endforeach
            </select>

            <input type="date" name="date" value="{{ request('date') }}">
            <button type="submit" class="btn-search">検索</button>
            <a href="{{ route('admin.index') }}" class="btn-reset">リセット</a>
        </form>
    </div>
    <div class="top-bar">
        <a href="{{ route('admin.export') }}" class="btn-export">エクスポート</a>
        <div class="pagination-container">
            {{ $contacts->onEachSide(1)->links('pagination::bootstrap-4') }}
        </div>
    </div>
    {{-- テーブル --}}
    <table class="contact-table">
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                <td>
                    @if($contact->gender === 1)
                        男性
                    @elseif($contact->gender === 2)
                        女性
                    @else
                        その他
                    @endif
                </td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category->content ?? '不明' }}</td>
                <td><a href="#modal-{{ $contact->id }}" class="btn-detail">詳細</a></td>
            </tr>

            {{-- モーダル --}}
            <div id="modal-{{ $contact->id }}" class="modal-overlay">
                <div class="modal-content">
                    <a href="#" class="modal-close">&times;</a>
                    <h2>お問い合わせ詳細</h2>
                    <dl>
                        <dt>お名前</dt>
                        <dd>{{ $contact->last_name }} {{ $contact->first_name }}</dd>

                        <dt>性別</dt>
                        <dd>
                            @if($contact->gender === 1)
                                男性
                            @elseif($contact->gender === 2)
                                女性
                            @else
                                その他
                            @endif
                        </dd>

                        <dt>メールアドレス</dt>
                        <dd>{{ $contact->email }}</dd>

                        <dt>電話番号</dt>
                        <dd>{{ $contact->tel }}</dd>

                        <dt>住所</dt>
                        <dd>{{ $contact->address }}</dd>

                        <dt>建物名</dt>
                        <dd>{{ $contact->building ?? '（なし）' }}</dd>

                        <dt>お問い合わせの種類</dt>
                        <dd>{{ $contact->category->content ?? '不明' }}</dd>

                        <dt>お問い合わせ内容</dt>
                        <dd>{{ $contact->detail }}</dd>
                    </dl>

                    <form action="{{ route('admin.destroy', $contact->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">削除</button>
                    </form>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
