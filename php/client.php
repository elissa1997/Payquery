<?php
define('ROOT_PATH',dirname(__FILE__));
include ("sql/payquery.php");
include ("sql/userquery.php");
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

$checkmode = "user";

$checkphone = authcode($cookie,'DECODE',$authkey,0);//cookie解密
$securitycheck = user_securitycheck($checkphone,$checkmode);

if($securitycheck == "security"){	
	if($type == "gongzi"){
		payall_query($checkphone,$date);
	}else if($type == "xiangqin"){
		paydetail_query($checkphone,$date);
	}
}else{
	echo "noaccess";
}

?>