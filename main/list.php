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
<tr><th>id</th><th>緯度</th><th>経度</th><th>ズーム度</th><th>住所</th><th>投稿日</th><th>削除</th></tr>
<tr v-for="item in items"><th>{{ item.id }}</th><th>{{ item.ido }}</th><th>{{ item.keido }}</th><th>{{ item.zoom_level }}</th><th>{{ item.address }}</th><th><input type="button" id="mapView" value="表示" onclick="setPoint({{ item.ido }},{{ item.keido }},{{ item.zoom_level }})" /></th><th>削除のリンク予定</th></tr>
</table>

<script>
var mainlist = new Vue({
	  el: '#main_list',
	  data: {
	    items: [
<?php

$page = (checkGet("page")) ? ($_GET['page']-1) * 10 : 0;
//mapテーブルから日付の降順でデータを取得

		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		try {
		    	$rows = $mysqli->query("SELECT * FROM map ORDER BY created DESC LIMIT 10 OFFSET ". $page);
		    	$length = mysqli_num_rows($rows);    // 追加
		    $no = 0;    // 追加

		} catch (mysqli_sql_exception $e) {
		    $error = $e->getMessage();
		}
		//header('Content-Type: text/html; charset=utf-8');
		if (isset($error)){
			h($error);
		}else{
			foreach ($rows as $row){ ?>
				{ id: '<?=h($row['id']);
				?>',ido: '<?=h($row['hidden_ido']);
				?>',keido: '<?=h($row['hidden_keido']);
				?>',zoom_level: '<?=h($row['hidden_zoom']);
				?>',address: '<?=h($row['hidden_address']);
				?>' }<?php $no++;if($no !== $length){echo ",";}?>

<?php }
		} ?>

	    ]
	  }
	})
</script>

<?php

$paging = (checkGet("page")) ? ($_GET['page']) * 1 : 1;

    	$result = $mysqli->query("SELECT COUNT(*) AS page_count FROM map");
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