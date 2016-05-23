<?php
require_once __DIR__.'/../include/password.php';
require_once __DIR__.'/../include/mysqli.php';
// セッション開始

// エラーメッセージの初期化
$Message = "の削除に失敗しました。";

// ログインボタンが押された場合
if (isset($_POST["delete"])) {

  // ２．ユーザIDとパスワードが入力されていたら認証する
  if (!empty($_POST["id"])) {
  	// mysqlへの接続
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS);
    mysqli_set_charset($mysqli, DB_CHARSET);
    if ($mysqli->connect_errno) {
      print('<p>データベースへの接続に失敗しました。</p>' . $mysqli->connect_error);
      exit();
    }

    // データベースの選択
    $mysqli->select_db(DB_NAME);

    // 入力値のサニタイズ
    $query = "SELECT * FROM map WHERE id = '" . $_POST["id"] . "'";

    $result = $mysqli->query($query);
    if (!$result) {
      print('クエリーが失敗しました。' . $mysqli->error);
      $mysqli->close();
      exit();
    } else {
		$row = $result->fetch_assoc();
		$db_hashed_pwd = $row['user_password'];
		$id= $row['id'];
		$user_url= $row['user_url'];
		$user_name= $row['user_name'];
		$user_comment= $row['user_comment'];
		$hidden_ido= $row['hidden_ido'];
		$hidden_keido= $row['hidden_keido'];
		$hidden_zoom= $row['hidden_zoom'];
		$hidden_address= $row['hidden_address'];
		$created= $row['created'];
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
      $Message = "を削除しました。";
    }
    else {
      // 認証失敗
      $Message = "の削除に失敗しました。パスワードに誤りがあります。";
    }
  } else {
    // 未入力なら何もしない
  }
}

?>