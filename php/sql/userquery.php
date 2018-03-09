<?php
header("Content-type: text/html; charset=utf-8");
include ("conn.php");

//后台拉取
function admin_get($li,$pag,$ser_na){
	$limit = $li;
	$page = $pag;
	$ser_name = urldecode($ser_na);
	$offset = ($page-1)*$limit;
	if($ser_name == ""){
		$rs = mysql_query("select * from user limit $offset,$limit");
		$count = mysql_query("select * from user");
		
	}else{
		$rs = mysql_query("select * from user where name like '%$ser_name%' limit $offset,$limit");
		$count = mysql_query("select * from user  where name like '%$ser_name%'");
		
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


//前台登录
function login($ph,$pd){
	$phone = $ph;
	$password = $pd;
		
	$check_query = mysql_query("select * from user where phone='$phone' and password='$password' limit 1");
	if($result = mysql_fetch_array($check_query)){
		$mode = $result["mode"];
		if($mode == "admin"){
			return "admin";
		}else if($mode == "user"){
			return "user";
		}
	}else{
		return "fail";
	}

}

//前台注册
function register($ph,$na,$pa){
	$phone = $ph;
	$name = $na;
	$password = $pa;
	
	$result = mysql_query("insert into user(phone,name,password,mode) values('$phone','$name','$password','user')");
	if($result){
		echo "注册成功";
	}else{
		echo "注册失败，请刷新页面重试";		
	}
}
?>