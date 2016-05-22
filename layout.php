<!DOCTYPE html>
<html lang="ja">
<!--function initializeで地図の初期画面構成を設定-->
<script type="text/javascript"
 src="http://maps.google.com/maps/api/js?libraries=adsense&sensor=false&language=ja"></script>

<body onload="initialize()"><?php
if($layout === "list"){
	require __DIR__.'/main/list.php';
} elseif($layout === "none"){

} elseif($layout === "delete"){
	require __DIR__.'/main/delete.php';
} else {
	require __DIR__.'/main/post.php';
}
?></body>
</html>