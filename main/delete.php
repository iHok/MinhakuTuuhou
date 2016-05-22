<script type="text/javascript">
<!--
	 function initialize() {
		 var marker;
		 var map;
		//中心座標は沖縄県庁の緯度、経度。地図の形式はROADMAPを選択
		 var latlng = new google.maps.LatLng(<?php echo $hidden_ido; ?>,<?php echo $hidden_keido; ?>);
		 var opts = {
		  zoom: <?php echo $hidden_zoom; ?>,
		  center: latlng,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		 }
		//id属性に"map_canvas"を指定しdiv要素を対象とするMapsクラスのオブジェクトを作成
		 map = new google.maps.Map
		 (document.getElementById("map_canvas"),opts);

		 //POIを消す
		 var styleOptions = [{
		     featureType: "poi",
		     elementType: "labels",
		     stylers: [
		         { visibility: "off" }
		     ]}
		 ];
		 map.setOptions({styles: styleOptions});
			marker = new google.maps.Marker({
				   position: latlng,
				   map: map
			  });
	}

	 // -->
</script>
<noscript>
JavaScript対応ブラウザで表示してください。
</noscript>

<div id="map_canvas" style="width:100%; height:500px"></div>


<?php
$text = "戻る";
// リファラ値がなければ<a>タグを挿入しない
if (empty($_SERVER['HTTP_REFERER'])) {
//  echo $text;
}
// リファラ値があれば<a>タグ内へ
else {
  echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">' . $text . "</a>";
}
?>

以下の登録情報<?php echo $Message;?><br>
<br>
<table style="width:500px;" >
<tr><td>建物名</td><td><?php echo $user_name; ?></td></tr>
<tr><td>民泊募集のURL</td><td><?php echo $user_name; ?></td></tr>
<tr><td>自由記入欄</td><td><?php echo $user_comment; ?></textarea></td></tr>
</table>

