<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>検索</title>
</head>
<body>

    <a href="/index.html">トップページに戻る</a>
    <br>

    <h1>検索</h1>
    <p>検索したい「書籍名」「著者名」「ISBNコード」(一部でもOK)を入力してください</p>

    <!-- 検索フォーム -->
    <div>
        <form action="{{ route('posts_index') }}" method="GET">
            <p>書籍名 <input type="text" name="title" required></p>
            <p>著者名 <input type="text" name="author" required></p>
            <p>ISBN <input type="text" name="isbn" required></p>
            <input type="submit" value="検索">
            <input type="reset" value="リセット">
        </form>
    </div>
    <!-- 検索フォームここまで -->

    <table>
        <tr>
            <th>書籍名</th><th>著者名</th><th>ISBN</th>
        </tr>

        <!-- 保存されているレコードを一覧表示 -->
        <!-- @forelse ($posts as $post)
            <tr>
                <td><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></td>
                <td>{{ $post->author }}</td>
                <td>{{ $post->isbn }}</td>
            </tr>
        @empty
            <tr><td colspan="3">No posts!!</td></tr>
        @endforelse -->
        </table>
</body>
</html>

    <!--<form action ="search.php" method="post">
        <p>書籍名 <input type="text" name="title" code="isbn" required></p>
        <p>著者名 <input type="text" name="author" code="isbn" required></p>
        <p>ISBN <input type="text" name="isbn" code="isbn" required></p>
        <input type="submit" value="検索">
        <input type="reset" value="リセット">
    </form>

</body>
</html>