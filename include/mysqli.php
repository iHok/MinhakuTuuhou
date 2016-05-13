<?php
define( 'DB_NAME', 'cms' );//データベース名
define( 'DB_USER', 'root' );//ユーザー名
define( 'DB_PASS', 'password' );//パスワード
define( 'DB_HOST', 'localhost' );//ホスト名
define( 'DB_CHARSET', 'utf8' );//文字セット
define( 'DB_COLLATE', 'utf8_general_ci' );//照合順序

//mysqliクラスのオブジェクトを作成
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//エラーが発生したら
if ($mysqli->connect_error){
  print("接続失敗：" . $mysqli->connect_error);
  exit();
}

$mysqlic = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);