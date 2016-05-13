<?php

if (isset($_POST['id_ido']))
{
    //ここに何かしらの処理を書く（DB登録やファイルへの書き込みなど）

	$query = "INSERT INTO map (ido , keido, zoom_level , address) VALUES (?,?, ?, ?)";
	$stmt = $mysqli->prepare($query);
	//$_POST["name"]に名前が、$_POST["message"]に本文が格納されているとする。
	//?の位置に値を割り当てる

	$stmt->bind_param('ddis', $_POST['id_ido'], $_POST['id_keido'], $_POST['id_level'], $_POST['id_address']);
	//実行
	$stmt->execute();

	echo $_POST['id_ido'];
}
else
{
    echo 'The parameter of "request" is not found.';
}