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
//    echo 'The parameter of "request" is not found.';
}
?>
<table border>
<tr><th>id</th><th>name</th><th>title</th><th>message</th><th>category</th><th>filename</th><th>投稿日</th><th>削除</th></tr>

<?php


if(isset($_POST['id_ido'])){
	$categorySearch = checkGet("category");
	$result = $mysqli->query("SELECT * FROM datas WHERE category = '". $categorySearch ."' ORDER BY created DESC LIMIT 20 OFFSET ". $page);
	echo "SELECT * FROM datas WHERE category = '". $categorySearch ."' ORDER BY created DESC";
}else{
	$result = $mysqli->query("SELECT * FROM map  LIMIT 20");
}
if($result){
	//1行ずつ取り出し
	while($row = $result->fetch_object()){
		//エスケープして表示
		$id = htmlspecialchars($row->id);
		$name = htmlspecialchars($row->ido);
		$title = htmlspecialchars($row->keido);
		$message = htmlspecialchars($row->zoom_level);
		$category = htmlspecialchars($row->address);
		print("<tr>
	<td><a href='index.php?id=$id&layout=post'>$id</a></td>
	<td>$name</td>
	<td>$title</td>
	<td>$message</td>
	<td>$category</td>
	<td><a href='index.php?id=$id&layout=delete'>削除</a></td>
	</tr>
	");}
}
?>


</table></body>
</html>