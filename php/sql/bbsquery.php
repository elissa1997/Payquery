<?php
include ("conn.php");
	
function bbs_admin_get($limit,$page,$ser_content){
	$ser_content = urldecode($ser_content);
	$offset = ($page-1)*$limit;
	if($ser_content == ""){
		$rs = mysql_query("select * from bbs limit $offset,$limit");
		$count = mysql_query("select * from bbs");
		
	}else{
		$rs = mysql_query("select * from bbs where content like '%$ser_content%' limit $offset,$limit");
		$count = mysql_query("select * from bbs where content like '%$ser_content%'");
		
	}
	$result = array();
	while($row = mysql_fetch_object($rs)){
		array_push($result, $row);
	}
	

	$num_rows = mysql_num_rows($count);
	
	$array=Array("code"=>0,"msg"=>"msg","count"=>$num_rows,"data"=>$result);
	echo json_encode($array);
	//echo $ser_name;
}

function bbs_index_get(){
	$rs = mysql_query("select content from bbs order by datetime desc limit 1");
	$result = array();
	while($row = mysql_fetch_object($rs)){
	    array_push($result, $row);
	}
	echo json_encode($result);
}

function bbs_admin_add($content){
	$result = mysql_query("insert into bbs (content,datetime) values('$content',now())");
	if($result){
		echo "success";
	}else{
		echo "fail";		
	}
}

function bbs_admin_del($id){
	$result = mysql_query("DELETE FROM bbs WHERE id = '$id'");
	if($result){
		echo "success";
	}else{
		echo "fail";
	}
}

function bbs_admin_upd($id,$field,$value){
	$result = mysql_query("UPDATE bbs SET $field = '$value' WHERE id='$id'");
	if($result){
		echo "success";
	}else{
		echo "fail";
	}
}
?>