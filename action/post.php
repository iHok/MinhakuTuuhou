<?php

//if (isset($_POST['hidden_ido'])){
    //ここに何かしらの処理を書く（DB登録やファイルへの書き込みなど）

	$query = "INSERT INTO map (user_name, user_url, user_comment, user_password, hidden_ido , hidden_keido, hidden_zoom , hidden_address) VALUES (? , ? , ? , ? , ? , ? , ? , ?)";
	$stmt = $mysqli->prepare($query);
	//$_POST["name"]に名前が、$_POST["message"]に本文が格納されているとする。
	//?の位置に値を割り当てる

	$stmt->bind_param('ssssddis', $_POST['user_name'], $_POST['user_url'], $_POST['user_comment'], $_POST['user_password'], $_POST['hidden_ido'], $_POST['hidden_keido'], $_POST['hidden_zoom'], $_POST['hidden_address']);
	//実行
	$stmt->execute();

	echo $_POST['hidden_ido'];
	echo $_POST['hidden_keido'];
	echo $_POST['hidden_zoom'];
	echo $_POST['hidden_address'];
//}
//else{    echo 'The parameter of "request" is not found.';}