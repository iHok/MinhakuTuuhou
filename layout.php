<!DOCTYPE html>
<html lang="ja">
<body onload="initialize()"><?php
if($layout === "list"){
	require __DIR__.'/main/list.php';
} elseif($layout === "none"){

} else {
	require __DIR__.'/main/post.php';
}
?></body>
</html>