    <script src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="js/map_post.js"></script>

<p><a href="index.php?layout=list">閲覧はこちら</a></p>


<div id="map_canvas" style="width:100%; height:500px"></div>
<form method="post">
<table style="width:500px;border:0;" >
<tr><td>建物名</td><td><input id="user_name" type="text"/></td></tr>
<tr><td>URL</td><td><input id="user_url" type="text" /></td></tr>
<tr><td>自由記入欄</td><td><textarea id="user_comment" type="" /></textarea></td></tr>
<tr><td>パスワード</td><td><input id="user_password" type="text" /></td></tr>
<tr><td>緯度</td><td><input id="hidden_ido" type="text" /></td></tr>
<tr><td>経度</td><td><input id="hidden_keido" type="text" /></td></tr>
<tr><td>ズーム</td><td><input id="hidden_zoom" type="text" /></td></tr>
<tr><td>住所</td><td><input id="hidden_address" type="text" /></td></tr>
</table>
<p><input id="send" value="送信" type="submit" /></p>
</form>
<br>
<a href="http://www.google-mapi.com/company.shtml" target="blank">
Google Maps JavaScript API V3の使い方</a>を参考に作成
</body>
</html>