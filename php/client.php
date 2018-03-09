<?php
define('ROOT_PATH',dirname(__FILE__));
include ("sql/payquery.php");
include ("auth.php");

if(isset($_POST['cookie'])){  
    $cookie = $_POST['cookie'];  
}else{  
    $cookie = "";  
}

if(isset($_POST['date'])){  
    $date = $_POST['date'];  
}else{  
    $date = "";  
}

if(isset($_POST['type'])){  
    $type = $_POST['type'];  
}else{  
    $type = "";  
}

$phone = authcode($cookie,'DECODE',$authkey,0);//cookie解密

if($type == "gongzi"){
	querygongzi($phone,$date);
}else if($type == "xiangqin"){
	queryxiangqing($phone,$date);
}
?>