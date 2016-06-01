<script type="text/javascript" src="js/map.js"></script>
<script src="http://code.jquery.com/jquery-1.6.2.min.js"></script>

<div id="map_canvas" style="width:100%; height:500px"></div>

<p><a href="index.php?layout=post">投稿はこちら</a></p>
<p><a href="index.php?layout=list">閲覧はこちら</a></p>

<form>
<table style="width:500px;border:0;" >
<input id="hidden_ido" type="hidden" name="layout" value="search"/>
<tr><td>検索種類</td><td><select name="type">
<option value="user_name" selected>建物名</option>
<option value="user_comment">自由記入欄</option>
<option value="address"></option>
</select>
<input name="word" type="text"/></td></tr>
</table>
<p><input id="send" value="送信" type="submit" onclick="func_send()"/></p>
</form>

