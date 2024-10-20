<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>レビューの削除確認</title>
</head>
<body>
    <h1>以下のレビューを削除してもよろしいでしょうか</h1>
    <table class="table">
        <tr><th>投稿者</th><th>投稿レビュー</th></tr>
        {{-- {{dd($review)}} --}}
        <form action="/deleteresult" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$review->id}}">
        <input type="hidden" name="post_review" value="{{$review->content}}">
        <tr>
            
            <td>{{Session::get("name",0)}}</td>
            <td>{{$review->content}}</td>
            <input type="submit" value="削除">
        </tr>
    </form>
    </table>
    <br>
    <a href="/bookdetail">前のページに戻る</a>
</body>
</html>