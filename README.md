家族限定のコミュニケーションwebサイト

2020U22

_____________________________________________________________________

使用環境

Laravel7 + React + firebase

firebase apiキー各自取得
sky way apiキー各自取得

sky wayはlocalhostかhttpsでしか動作しない
_____________________________________________________________________

展開

cp .env.example .env

php artisan key:generate

composer update

npm install

npm run dev

php artisan command:tuzukigara_insert
