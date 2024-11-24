## cloneした人用
```
git clone https://github.com/marusan25/library.git
```
- libraryフォルダを開く
```
composer install
```
```
cp .env.example .env
```
```
php artisan key:generate
```
- envにデータベースのコネクション名(例：mysql)・ホスト名・データベース名・ユーザ名・パスワードを入力
```
php artisan config:clear
```

---
以下、環境次第でコマンドが変わるのでGPTに質問！
```
chmod -R 775 storage
```
```
chown -R www-data:www-data storage
```
```
chmod -R 775 bootstrap/cache
```
---

```
php artisan migrate --seed
```
```
git checkout -b feature/各自のブランチ
```

<br>


## ★adminLteの参考サイトです
https://qiita.com/amitsuoka/items/32c806bd3d66ee174704  
※ config/adminlte.phpを編集したら
```
php artisan config:clear
```


## ★fontawsome versionは5.1.54で！
https://fontawesome.com/icons

<br>

## ★Google books APIのサンプルです(json)
https://www.googleapis.com/books/v1/volumes?q=%E3%82%B9%E3%83%83%E3%82%AD%E3%83%AA

##### 取得できる情報に入っているサムネイル
http://books.google.com/books/content?id=NpbgEAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api


<br>

## テーブル
#### users
|カラム名|データ型|内容|補足|
|--------|------|------|------|
|id|INT|主キー||
|name|VARCHAR|社員名||
|email|VARCHAR|メールアドレス||
|password|VARCHAR|パスワード|ハッシュ化済み(例)Hash::make('password')|
|role|INT|役職|初期値0|

<br>

#### reviews
|カラム名|データ型|内容|補足|
|-----------|-----------|-----------|-----------|
|id|INT|主キー||
|user_id|INT|ユーザーID|usersテーブルの外部キー|
|book_id|INT|書籍番号|booksテーブルの外部キー|
|score|INT|レビュー件数|点数|
|content|TEXT|レビュー内容||
|reviewed_at|DATETIME|レビュー日時|レビューの並び替えに使用|

<br>

#### books
|カラム名|データ型|内容|補足|
|-----------|-----------|-----------|-----------|
|id|INT|主キー||
|isbn|VARCHAR|ISBN|Google Books API|
|title|VARCHAR|書名|Google Books API|
|author|VARCHAR|著者|Google Books API|
|publisher|VARCHAR|出版社|Google Books API|
|amount|INT|価格|Google Books API|
|thumbnail_path|VARCHAR|サムネイルのURL|Google Books API|
|description|TEXT|本の詳細|Google Books API|


