
<script type="text/javascript"
 src="http://maps.google.com/maps/api/js?libraries=adsense&sensor=false&language=ja"></script>
<!--function initializeで地図の初期画面構成を設定-->


	<script type="text/javascript" src="js/map.js"></script>
    <script src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="js/post.js"></script>
<p>地図上で目的地をクリックすると座標・住所を取得できます。

<div id="map_canvas" style="width:100%; height:500px"></div>
<form method="post">
<table style="width:500px;border:0;" >
<tr><td width="50px">緯度</td><td><input type="text" id="id_ido"/></td></tr>
<tr><td>経度</td><td><input id="id_keido" type="text" /></td></tr>
<tr><td>ズーム</td><td><input id="id_level" type="text" /></td></tr>
<tr><td>住所</td><td><input id="id_address" type="text" /></td></tr>
</table>
<p><input id="send" value="送信" type="submit" /></p>
</form>
<br>
<a href="http://www.google-mapi.com/company.shtml" target="blank">
Google Maps JavaScript API V3の使い方</a>を参考に作成
</body>
</html>