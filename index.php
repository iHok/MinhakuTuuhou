<?php
require_once __DIR__.'/include/mysqli.php';

    function CheckGet($name) {
        return $hoge = filter_input(INPUT_GET, $name);
    }
    function CheckPost($name) {
        return filter_input(INPUT_POST, $name);
    }
    function h($str) {
    	return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }
	$action = CheckGet("action");
	if($action) {
		$flag = false;
		require __DIR__.'/action.php';
	}
?>
<?php
	$layout = CheckGet("layout");
	if($layout) {
		$flag = false;
		require __DIR__.'/layout.php';
	} else {
		require __DIR__.'/layout.php';
	}
?>