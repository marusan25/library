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


```
php artisan migrate --seed
```
```
git checkout -b feature/各自のブランチ
```


## adminLteの参考サイトです
https://qiita.com/amitsuoka/items/32c806bd3d66ee174704

## fontawsome versionは5.1.54で！
https://fontawesome.com/icons

## Google books APIのサンプルです(json)
https://www.googleapis.com/books/v1/volumes?q=%E3%82%B9%E3%83%83%E3%82%AD%E3%83%AA

##### 取得できる情報に入っているサムネイル
http://books.google.com/books/content?id=NpbgEAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api
