<?php

$id = $_GET['id']; # $v1=30

$query = "DELETE FROM datas WHERE id=" .$id;
$stmt = $mysqli->prepare($query);
$stmt->execute();

$text = "戻る";
// リファラ値がなければ<a>タグを挿入しない
if (empty($id)) {
    header("Location:index.php?action=delete");
}else {// リファラ値があれば<a>タグ内へ
    header("Location:index.php?id=".$id."&alart=delete");
}