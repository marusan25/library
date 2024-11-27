<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>レビューの追加</title>
</head>
<body>
    <h1>レビューを追加しました</h1>
    <table class="table">
        <tr><th>投稿者</th><th>投稿レビュー</th></tr>
        <tr>
            <td>{{Session::get("name",0)}}</td>
            <td>{{$content}}</td>
        </tr>
    </table>
    <br>
    <a href="/">Topページに戻る</a>
</body>
</html>
