<?php

    //ここに何かしらの処理を書く（DB登録やファイルへの書き込みなど）

	$status = "";
	$query = "INSERT INTO map (user_name, user_url, user_comment, user_password, hidden_ido , hidden_keido, hidden_zoom , hidden_address , hidden_ip_address) VALUES (? , ? , ? , ? , ? , ? , ? , ?, ?)";

	if (strpos(parse_url($_POST['user_url'], PHP_URL_HOST),'.airbnb.')) {
		if(isset($_POST['user_password'])){
			//パスワードはハッシュ化する
			$password = password_hash($_POST["user_password"], PASSWORD_DEFAULT);
		}



		$stmt = $mysqli->prepare($query);
		//$_POST["name"]に名前が、$_POST["message"]に本文が格納されているとする。
		//?の位置に値を割り当てる

		$stmt->bind_param('ssssddiss', $_POST['user_name'], $_POST['user_url'], $_POST['user_comment'], $password, $_POST['hidden_ido'], $_POST['hidden_keido'], $_POST['hidden_zoom'], $_POST['hidden_address'] , $_SERVER['REMOTE_ADDR']);
		//実行

		if($stmt->execute()){
			$status = $_POST['user_name']."を登録しました。";
		} else {
			$status = $_POST['user_name']."を登録に失敗しました。";
		}
	} else {
		$status = "入力したURL『". $_POST['user_url'] ."』は、airbnbのURLではありません。";
	}
	echo $status;