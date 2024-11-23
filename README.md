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
- envにデータベースのコネクション名・データベース名・ユーザ名・パスワードを入力
```
php artisan config:clear
```
```
chmod -R 775 strage
chmod -R 775 bootstrap/cache
```
```
php artisan migrate
```
```
git checkout -b feature/各自のブランチ
```
