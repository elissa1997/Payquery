<?php
define('ROOT_PATH',dirname(__FILE__));
include("sql/userquery.php");
include("auth.php");

if(isset($_GET['type'])){
	$type = $_GET['type'];
}else{
	$type = "";	
}

if(isset($_GET['cookie'])){  
    $cookie = $_GET['cookie'];  
}else{  
    $cookie = "";  
}

if(isset($_GET['limit'])){  
    $limit = $_GET['limit'];  
}else{  
    $limit = "";  
}

if(isset($_GET['page'])){  
    $page = $_GET['page'];  
}else{  
    $page = "";  
}
if(isset($_GET['ser_name'])){  
    $ser_name = $_GET['ser_name'];  
}else{  
    $ser_name = "";  
}

if(isset($_POST['id'])){
	$id = $_POST['id'];
}else{
	$id = "";
}


if(isset($_POST['name'])){
	$name = $_POST['name'];
}else{
	$name = "";
}

if(isset($_POST['phone'])){
	$phone = $_POST['phone'];
}else{
	$phone = "";
}

if(isset($_POST['password'])){
	$password = $_POST['password'];
}else{
	$password = "";
}

if(isset($_POST['mode'])){
	$mode = $_POST['mode'];
}else{
	$mode = "";
}

if(isset($_POST['field'])){  
    $field = $_POST['field'];  
}else{  
    $field = "";  
}

if(isset($_POST['value'])){  
    $value = $_POST['value'];  
}else{  
    $value = "";  
}

$checkmode = "admin";

$checkphone = authcode($cookie,'DECODE',$authkey,0);//cookie解密
$securitycheck = user_securitycheck($checkphone,$checkmode);

if($securitycheck == "security"){	
	if($type == "admin_get"){
		admin_get($limit,$page,$ser_name);
	}else if($type == "admin_add"){
		admin_add($name,$phone,$password,$mode);
	}else if($type == "admin_del"){
		admin_del($id);
	}else if($type == "admin_upd"){
		admin_upd($id,$field,$value);
	}
}else{
	echo "noaccess";
}
?>