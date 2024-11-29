<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>レビューの修正</title>
</head>
<body>
    <h1>投稿レビューの修正</h1>
    {{-- @if(isset($record)) --}}
        <form action="/editresult" method="post">
        @csrf
        <input type="hidden" name="bookId" value="{{$bookId}}">
        <input type="hidden" name="reviewId" value="{{$review->id}}"><br>
        投稿レビュー
        <input type="number" name="score" placeholder="スコア (1-5)" min="1" max="5" value="{{$review->score}}" required>
        <textarea name="post_review">{{$review->content}}</textarea><br>
        <input type="submit" value="修正">
        </form>
        <a href="/bookdetail?book={{$bookId}}">前のページに戻る</a>
    {{-- @else
        <form action="/bookdetail" method="post"></form>
        @csrf
    @endif --}}
</body>
</html>