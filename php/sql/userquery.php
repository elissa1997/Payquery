<?php
header("Content-type: text/html; charset=utf-8");
include ("conn.php");

//用户鉴权检查
function user_securitycheck($phone,$mode){
	$check_query = mysql_query("select * from user where phone='$phone' and mode='$mode' limit 1");
	if($result = mysql_fetch_array($check_query)){
		return "security";
	}else{
		return "noaccess";
	}
}

//管理员鉴权检查
function admin_securitycheck($phone,$mode){
	$check_query = mysql_query("select * from user where phone='$phone' and mode='$mode' limit 1");
	if($result = mysql_fetch_array($check_query)){
		return "security";
	}else{
		return "noaccess";
	}
}

function admin_add($name,$phone,$password,$mode){
	$result = mysql_query("insert into user (phone,name,password,mode) values('$phone','$name','$password','$mode')");
	if($result){
		echo "success";
	}else{
		echo "fail";		
	}
}

function admin_del($id){
	$result = mysql_query("DELETE FROM user WHERE id = '$id'");
	if($result){
		echo "success";
	}else{
		echo "fail";
	}
}

function admin_upd($id,$field,$value){
	$result = mysql_query("UPDATE user SET $field = '$value' WHERE id='$id'");
	if($result){
		echo "success";
	}else{
		echo "fail";
	}
}

//后台拉取
function admin_get($limit,$page,$ser_name){
	$ser_name = urldecode($ser_name);
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
function login($phone,$password){
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
function register($phone,$name,$password){
	$result = mysql_query("insert into user(phone,name,password,mode) values('$phone','$name','$password','user')");
	if($result){
		echo "注册成功";
	}else{
		echo "注册失败，请刷新页面重试";		
	}
}
?>