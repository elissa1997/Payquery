<?php
define('ROOT_PATH',dirname(__FILE__));
include("sql/userquery.php");
include("sql/bbsquery.php");
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
if(isset($_GET['ser_content'])){  
    $ser_content = $_GET['ser_content'];  
}else{  
    $ser_content = "";  
}

//-------------------------------------

if(isset($_POST['content'])){
	$content = $_POST['content'];
}else{
	$content = "";
}

//------------------------------------

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

if(isset($_POST['id'])){
	$id = $_POST['id'];
}else{
	$id = "";
}


$checkmode = "admin";

$checkphone = authcode($cookie,'DECODE',$authkey,0);//cookie解密
$securitycheck = user_securitycheck($checkphone,$checkmode);

if($securitycheck == "security"){
	if($type == "admin_get"){
		bbs_admin_get($limit,$page,$ser_content);
	}else if($type == "admin_add"){
		bbs_admin_add($content);
	}else if($type == "admin_del"){
		bbs_admin_del($id);
	}else if($type == "admin_upd"){
		bbs_admin_upd($id,$field,$value);
	}
}else{
	echo "noaccess";
}
?>