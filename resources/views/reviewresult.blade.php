<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="images/book.png">
    <title>{{$title}}</title>
</head>
<body>
    <h1>{{$msg}}</h1>
    <table class="table">
        <tr><th>投稿者</th><th>投稿レビュー</th></tr>
        <tr>
            <td>{{Session::get("name",0)}}</td>
            <td>{{$content}}</td>
        </tr>
    </table>
    <br>
    <a href="/bookdetail?book={{$book_id}}">前のページに戻る</a>
</body>
</html>
