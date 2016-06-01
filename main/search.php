<script type="text/javascript" src="js/map.js"></script>
<p><a href="index.php">登録はこちら</a></p>

<script src="http://cdnjs.cloudflare.com/ajax/libs/vue/1.0.17/vue.min.js"></script>
	<script type="text/javascript" src="js/map_select.js"></script>
<style>
[v-cloak] {
    display: none;
}
</style>

<div id="map_canvas" style="width:100%; height:500px"></div>

<table border id="main_list">
<tr><th>id</th><th>建物名</th><th>民泊募集のURL</th><th>自由記入欄（抜粋）</th><th>投稿日</th><th>削除</th></tr>
	<tr v-for="item in items">
		<td>{{ item.id }}</td>
		<td>{{ item.user_name }}</td>
		<td>{{ item.user_url }}</td>
		<td>{{ item.user_comment }}</td>
		<td><input type="button" id="mapView" value="表示" onclick="setPoint({{ item.hidden_ido }},{{ item.hidden_keido }},{{ item.hidden_zoom }})" /></td>
		<td>
			<form method="post" action="?action=delete&layout=delete"  name="del_form"
				onSubmit="return (input=prompt('パスワードを入力して下さい'))==null?false:document.getElementById('password{{ item.id }}').value=input;" >
			<input type="hidden" name="id" value="{{ item.id }}"><input type="hidden" name="password" id="password{{ item.id }}">
			<input type="submit" name="delete" value="削除" />
		</form></td>
	</tr>
</table>

<script>
var mainlist = new Vue({
	  el: '#main_list',
	  data: {
	    items: [
<?php
if(checkGet("type") && checkGet("word") ){
	$searchType = checkGet("type");
	$searchWord = $_GET["word"] != 'address'  ? $_GET["word"] : 'hidden_address';

	$page = (checkGet("page")) ? ($_GET['page']-1) * 10 : 0;
	//mapテーブルから日付の降順でデータを取得
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		try {
				$rows = $mysqli->query("SELECT * FROM map WHERE ". $searchType ."  LIKE '%". $searchWord ."%' ORDER BY created DESC LIMIT 10 OFFSET ". $page);
		    	$length = mysqli_num_rows($rows);    // 追加
		    $no = 0;    // 追加

		} catch (mysqli_sql_exception $e) {
		    $error = $e->getMessage();
		}
}
		//header('Content-Type: text/html; charset=utf-8');
		if (isset($error)){
			h($error);
		}else{
			foreach ($rows as $row){ ?>
				{ id: '<?=h($row['id']);
				?>',user_name: '<?=h($row['user_name']);
				?>',user_url: '<?=h($row['user_url']);
				?>',user_comment: '<?=h($row['user_comment']);
				?>',hidden_ido: '<?=h($row['hidden_ido']);
				?>',hidden_keido: '<?=h($row['hidden_keido']);
				?>',hidden_zoom: '<?=h($row['hidden_zoom']);
				?>' }<?php $no++;if($no !== $length){echo ",";}?>

<?php }
		} ?>

	    ]
	  }
	})
</script>

<?php

$paging = (checkGet("page")) ? ($_GET['page']) * 1 : 1;

    	$result = $mysqli->query("SELECT COUNT(*) AS page_count FROM map WHERE ". $searchType ."  LIKE '%". $searchWord ."%'");
		if($result){
			//1行ずつ取り出し
			$row = $result->fetch_object();
			//エスケープして表示
			$page_count = htmlspecialchars($row->page_count);
		}
		$nextpage = ($paging + 1);
		$prevpage = ($paging - 1);
		if(1 <$paging){
			echo "<a href='?layout=list&page=".$prevpage."'>前のページへ</a>　";
		}
		if($paging * 10 < $page_count){
			echo "<a href='?layout=list&page=".$nextpage."'>次のページへ</a>";
		}
		?>


