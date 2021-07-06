<?php
$dsn = 'mysql:dbname=puipui;host=db';
define('DSN', $dsn);
$db_user = 'docker';
$db_password = 'docker';
define('DB_USER', $db_user);
define('DB_PASSWORD', $db_password);

if(date_default_timezone_get() != "Asia/Tokyo"){
    date_default_timezone_set("Asia/Tokyo"); //タイムゾーンを東京に設定
}


error_reporting(E_ALL & ~E_NOTICE);     // E_NOTICE以外のエラーをすべて出力する
// 開発時はerror_reporting(E_ALL & ~E_NOTICE)としてE_NOTICE以外のエラーをすべて出力し、
// 公開時はerror_reporting(0)としてエラーを出力しないようにする

session_set_cookie_params(1440, '/');   // セッションの設定をする
// 第一引数がセッションの有効期限
// 第二引数が有効範囲('/'と記述すれば全範囲でセッションが有効になる)