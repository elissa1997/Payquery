<?php
include ("conn.php");

//后台拉取
function admin_get($li,$pag,$ser_na,$ser_da){
	$limit = $li;
	$page = $pag;
	$ser_name = urldecode($ser_na);
	$ser_date = $ser_da;
	
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

function admin_add($name,$phone,$weihukaitong5,$ticheng5,$jijian5,$choujin,$abcjiben,$qita,$zongji,$adddate){
	$result = mysql_query("insert into gongzi (phone,name,weihukaitong5,ticheng5,jijian5,choujin,abcjiben,qita,zongji,date) values('$phone','$name','$weihukaitong5','$ticheng5','$jijian5','$choujin','$abcjiben','$qita','$zongji','$adddate')");
	if($result){
		echo "success";
	}else{
		echo "fail";		
	}
}

//前台用户查询
function querygongzi($p,$d){
	$phone = $p;
	$date = $d;
	$rs = mysql_query("select * from gongzi where phone='$phone' and date='$date'");
	$result = array();
	while($row = mysql_fetch_object($rs)){
	    array_push($result, $row);
	}
	echo json_encode($result);
}

//前台用户查询详单
function queryxiangqing($p,$d){
	$phone = $p;
	$date = $d;
	$rs = mysql_query("select * from xiangqin where phone='$phone' and date='$date'");
	$result = array();
	while($row = mysql_fetch_object($rs)){
	    array_push($result, $row);
	}
	echo json_encode($result);
}


?>