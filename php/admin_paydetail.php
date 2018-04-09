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

if(isset($_POST['xiangmu'])){
	$xiangmu = $_POST['xiangmu'];
}else{
	$xiangmu = "";
}

if(isset($_POST['jiner'])){
	$jiner = $_POST['jiner'];
}else{
	$jiner = "";
}

if(isset($_POST['kaohe'])){
	$kaohe = $_POST['kaohe'];
}else{
	$kaohe = "";
}

if(isset($_POST['kaohephone'])){
	$kaohephone = $_POST['kaohephone'];
}else{
	$kaohephone = "";
}

if(isset($_POST['adddate'])){
	$adddate = $_POST['adddate'];
}else{
	$adddate = "";
}

//-------------------------------------

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
		paydetail_admin_get($limit,$page,$ser_name,$ser_date);
	}else if($type == "admin_add"){
		paydetail_admin_add($name,$phone,$xiangmu,$jiner,$kaohe,$kaohephone,$adddate);
	}else if($type == "admin_del"){
		paydetail_admin_del($id);
	}else if($type == "admin_upd"){
		paydetail_admin_upd($id,$field,$value);
	}
}else{
	echo "noaccess";
}

?>