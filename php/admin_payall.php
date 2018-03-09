<?php
define('ROOT_PATH',dirname(__FILE__));
include("sql/payquery.php");

$type = $_REQUEST['type'];

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


if($type == "admin_get"){
	admin_get($limit,$page,$ser_name,$ser_date);
}else if($type == "admin_add"){
	admin_add($name,$phone,$weihukaitong5,$ticheng5,$jijian5,$choujin,$abcjiben,$qita,$zongji,$adddate);
}

?>