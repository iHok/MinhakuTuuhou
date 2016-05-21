<?php
require_once __DIR__.'/../include/password.php';
require_once __DIR__.'/../include/mysqli.php';
// セッション開始

// エラーメッセージの初期化
$errorMessage = "最初";

// ログインボタンが押された場合
if (isset($_POST["delete"])) {
	$errorMessage = "2";

  // ２．ユーザIDとパスワードが入力されていたら認証する
  if (!empty($_POST["id"])) {
  	// mysqlへの接続
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS);
    if ($mysqli->connect_errno) {
      print('<p>データベースへの接続に失敗しました。</p>' . $mysqli->connect_error);
      exit();
    }

    // データベースの選択
    $mysqli->select_db(DB_NAME);

    // 入力値のサニタイズ
    $query = "SELECT * FROM map WHERE id = '" . $_POST["id"] . "'";
	echo $query;
    $result = $mysqli->query($query);
    if (!$result) {
      print('クエリーが失敗しました。' . $mysqli->error);
      $mysqli->close();
      exit();
    }

    while ($row = $result->fetch_assoc()) {
      // パスワード(暗号化済み）の取り出し
      $db_hashed_pwd = $row['user_password'];
    }

    // ３．画面から入力されたパスワードとデータベースから取得したパスワードのハッシュを比較します。
    //if ($_POST["password"] == $pw) {
    if (password_verify($_POST["password"], $db_hashed_pwd)) {
      // ４．認証成功なら、セッションIDを新規に発行する
    	$query = "DELETE FROM map WHERE id='" . $_POST["id"] . "'";
    	$stmt = $mysqli->prepare($query);
    	$stmt->execute();
    // データベースの切断
    $mysqli->close();
    exit;
    }
    else {
      // 認証失敗
      $errorMessage = "ユーザIDあるいはパスワードに誤りがあります。";
    }
  } else {
    // 未入力なら何もしない
  }
}
header("Location:". $_SERVER['HTTP_REFERER']);
