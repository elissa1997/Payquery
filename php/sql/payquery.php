<?php
include ("conn.php");
header('Content-type: application/json');
//后台拉取
function payall_admin_get($limit,$page,$ser_name,$ser_date){
	$ser_name = urldecode($ser_name);
	
	$offset = ($page-1)*$limit;
	if($ser_name == ""){
		$rs = mysql_query("select * from gongzi where date = '$ser_date' limit $offset,$limit");
		$count = mysql_query("select * from gongzi where date = '$ser_date'");
	}else{
		$rs = mysql_query("select * from gongzi where date = '$ser_date' and name like '%$ser_name%' limit $offset,$limit");
		$count = mysql_query("select * from gongzi where date = '$ser_date' and name like '%$ser_name%'");
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

function payall_admin_add($name,$phone,$weihukaitong5,$ticheng5,$jijian5,$choujin,$abcjiben,$qita,$zongji,$adddate){
	$result = mysql_query("insert into gongzi (phone,name,weihukaitong5,ticheng5,jijian5,choujin,abcjiben,qita,zongji,date) values('$phone','$name','$weihukaitong5','$ticheng5','$jijian5','$choujin','$abcjiben','$qita','$zongji','$adddate')");
	if($result){
		echo "success";
	}else{
		echo "fail";		
	}
}

function payall_admin_del($id){
	$result = mysql_query("DELETE FROM gongzi WHERE id = '$id'");
	if($result){
		echo "success";
	}else{
		echo "fail";
	}
}

function payall_admin_upd($id,$field,$value){
	$result = mysql_query("UPDATE gongzi SET $field = '$value' WHERE id='$id'");
	if($result){
		echo "success";
	}else{
		echo "fail";
	}
}

function paydetail_admin_get($limit,$page,$ser_name,$ser_date){
	$ser_name = urldecode($ser_name);
	
	$offset = ($page-1)*$limit;
	if($ser_name == ""){
		$rs = mysql_query("select * from xiangqin where date = '$ser_date' limit $offset,$limit");
		$count = mysql_query("select * from xiangqin where date = '$ser_date'");
	}else{
		$rs = mysql_query("select * from xiangqin where date = '$ser_date' and name like '%$ser_name%' limit $offset,$limit");
		$count = mysql_query("select * from xiangqin where date = '$ser_date' and name like '%$ser_name%'");
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

function paydetail_admin_add($name,$phone,$xiangmu,$jiner,$kaohe,$kaohephone,$adddate){
	$result = mysql_query("insert into xiangqin (phone,name,xiangmu,jiner,kaoheren,kaohephone,date) values('$phone','$name','$xiangmu','$jiner','$kaohe','$kaohephone','$adddate')");
	if($result){
		echo "success";
	}else{
		echo "fail";		
	}
}

function paydetail_admin_del($id){
	$result = mysql_query("DELETE FROM xiangqin WHERE id = '$id'");
	if($result){
		echo "success";
	}else{
		echo "fail";
	}
}

function paydetail_admin_upd($id,$field,$value){
	$result = mysql_query("UPDATE xiangqin SET $field = '$value' WHERE id='$id'");
	if($result){
		echo "success";
	}else{
		echo "fail";
	}
}

//前台用户查询
function payall_query($phone,$date){
	$rs = mysql_query("select * from gongzi where phone='$phone' and date='$date'");
	$result = array();
	while($row = mysql_fetch_object($rs)){
	    array_push($result, $row);
	}
    echo json_encode($result);
}

//前台用户查询详单
function paydetail_query($phone,$date){
	$rs = mysql_query("select * from xiangqin where phone='$phone' and date='$date'");
	$result = array();
	while($row = mysql_fetch_object($rs)){
	    array_push($result, $row);
	}
	echo json_encode($result);
}


?>