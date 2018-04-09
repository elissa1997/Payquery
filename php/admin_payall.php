<?php
define('ROOT_PATH',dirname(__FILE__));
include("auth.php");
include("sql/payquery.php");
include("sql/userquery.php");

if(isset($_REQUEST['type'])){
	$type = $_REQUEST['type'];	
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

if(isset($_GET['ser_date'])){  
    $ser_date = $_GET['ser_date'];  
}else{  
    $ser_date = "";  
}
//----------------------------------------
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
if(isset($_POST['weihukaitong5'])){  
    $weihukaitong5 = $_POST['weihukaitong5'];  
}else{  
    $weihukaitong5 = "";  
}
if(isset($_POST['ticheng5'])){  
    $ticheng5 = $_POST['ticheng5'];  
}else{  
    $ticheng5 = "";  
}
if(isset($_POST['jijian5'])){  
    $jijian5 = $_POST['jijian5'];  
}else{  
    $jijian5 = "";  
}
if(isset($_POST['choujin'])){  
    $choujin = $_POST['choujin'];  
}else{  
    $choujin = "";  
}
if(isset($_POST['abcjiben'])){  
    $abcjiben = $_POST['abcjiben'];  
}else{  
    $abcjiben = "";  
}
if(isset($_POST['qita'])){  
    $qita = $_POST['qita'];  
}else{  
    $qita = "";  
}
if(isset($_POST['zongji'])){  
    $zongji = $_POST['zongji'];  
}else{  
    $zongji = "";  
}
if(isset($_POST['adddate'])){  
    $adddate = $_POST['adddate'];  
}else{  
    $adddate = "";  
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
		payall_admin_get($limit,$page,$ser_name,$ser_date);
	}else if($type == "admin_add"){
		payall_admin_add($name,$phone,$weihukaitong5,$ticheng5,$jijian5,$choujin,$abcjiben,$qita,$zongji,$adddate);
	}else if($type == "admin_del"){
		payall_admin_del($id);
	}else if($type == "admin_upd"){
		payall_admin_upd($id,$field,$value);
	}
}else{
	echo "noaccess";
}

?>