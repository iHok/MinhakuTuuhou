<?php

$id = $_GET['id']; # $v1=30
?>



	<ul class="list-group">
    <br>
    <?php echo("$id"); ?> を削除します。<br>よろしいですか？
    <form action="index.php?id=<?php echo("$id"); ?>&action=delete" method = "POST">
		<button>削除する。</button>
	</form>
	</ul>
</div>
        </form>
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
</body>
</html>
