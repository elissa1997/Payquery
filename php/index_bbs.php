<?php
define('ROOT_PATH',dirname(__FILE__));
include("sql/bbsquery.php");

if(isset($_POST['type'])){
	$type = $_POST['type'];
}else{
	$type = "";	
}

if($type == "getbbs"){
	bbs_index_get();
}
?>