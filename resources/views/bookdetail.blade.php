<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>書籍詳細</title>
</head>
<body>
    <h1>書籍詳細</h1>

{{-- 書籍の詳細が出てくるコード --}}

 <h1>レビュー一覧</h1>
    
@extends('layouts.app')

@section('content')
<div class="container">
    {{dd($book)}}
    <h1>{{ $book->title }}</h1>
    <p>著者: {{ $book->author }}</p>
    <p>出版社: {{ $book->publisher }}</p>
    <p>価格: ¥{{ number_format($book->amount) }}</p>
    <img src="{{ $book->thumbnail_path }}" alt="Thumbnail">
    <p>{{ $book->description }}</p>

    <h2>レビュー一覧</h2>
    @foreach ($book->reviews as $review)
        <div>
            <p>スコア: {{ $review->score }}</p>
            <p>コメント: {{ $review->post_review }}</p>
            <p>投稿者: {{ $review->user_id }}</p>

            <!-- 編集・削除フォーム -->
            <form action="{{ route('reviews.destroy', [$book->id, $review->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">削除</button>
            </form>

            <form action="{{ route('reviews.update', [$book->id, $review->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="post_review" value="{{ $review->post_review }}">
                <input type="number" name="score" value="{{ $review->score }}" min="1" max="5">
                <button type="submit">更新</button>
            </form>
        </div>
    @endforeach

    <h2>レビューを追加</h2>
    <form action="{{ route('reviews.store', $book->id) }}" method="POST">
        @csrf
        <input type="number" name="score" placeholder="スコア (1-5)" min="1" max="5" required>
        <textarea name="post_review" placeholder="レビュー内容" required></textarea>
        <input type="text" name="user_id" placeholder="ユーザーID" required>
        <button type="submit">投稿</button>
    </form>
</div>
@endsection

</html>
