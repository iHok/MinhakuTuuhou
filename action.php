<?php
if($action === "post"){
	require __DIR__.'/action/post.php';
} elseif ($action === "delete"){
	
	require __DIR__.'/action/delete.php';
} else {

}