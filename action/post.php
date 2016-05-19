<?php

    //ここに何かしらの処理を書く（DB登録やファイルへの書き込みなど）

	$status = "none";
	$query = "INSERT INTO map (user_name, user_url, user_comment, user_password, hidden_ido , hidden_keido, hidden_zoom , hidden_address) VALUES (? , ? , ? , ? , ? , ? , ? , ?)";


	if(isset($_POST['user_password'])){
		//パスワードはハッシュ化する
		$password = password_hash($_POST["user_password"], PASSWORD_DEFAULT);
	}



	$stmt = $mysqli->prepare($query);
	//$_POST["name"]に名前が、$_POST["message"]に本文が格納されているとする。
	//?の位置に値を割り当てる

	$stmt->bind_param('ssssddis', $_POST['user_name'], $_POST['user_url'], $_POST['user_comment'], $password, $_POST['hidden_ido'], $_POST['hidden_keido'], $_POST['hidden_zoom'], $_POST['hidden_address']);
	//実行
	if($stmt->execute()){
		$status = "ok";
	} else {
		$status = "failed";
	}
	echo $_POST['user_name']."を登録しました。";