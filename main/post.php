    <script src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="js/map_post.js"></script>

<p><a href="index.php?layout=list">閲覧はこちら</a></p>


<div id="map_canvas" style="width:100%; height:500px"></div>
<form method="post">
<table style="width:500px;border:0;" >
<tr><td>建物名</td><td><input id="user_name" type="text"/></td></tr>
<tr><td>民泊募集のURL</td><td><input id="user_url" type="text"/></td></tr>
<tr><td>自由記入欄</td><td><textarea id="user_comment" type="text" /></textarea></td></tr>
<tr><td>パスワード</td><td><input id="user_password" type="text" /></td></tr>
<tr><td>地図の選択</td><td><span id="map_selected">選択されていません</span></td></tr>
</table>
<input id="hidden_ido" type="hidden" />
<input id="hidden_keido" type="hidden" />
<input id="hidden_zoom" type="hidden" />
<input id="hidden_address" type="hidden" />
<p><input id="send" value="送信" type="submit" onclick="func_send()"/></p>
</form>
<br>
<a href="http://www.google-mapi.com/company.shtml" target="blank">
Google Maps JavaScript API V3の使い方</a>を参考に作成
</body>
</html>