<?php
define('ROOT_PATH',dirname(__FILE__));
include ("sql/userquery.php");
include ("auth.php");

$type = $_POST['type'];
 
if(isset($_POST['log_phone'])){  
    $log_phone = $_POST['log_phone'];  
}else{  
    $log_phone = "";  
}
if(isset($_POST['log_password'])){  
    $log_password = $_POST['log_password'];  
}else{  
    $log_password = "";  
}


if(isset($_POST['reg_phone'])){  
    $reg_phone = $_POST['reg_phone'];  
}else{  
    $reg_phone = "";  
}
if(isset($_POST['reg_name'])){  
    $reg_name = $_POST['reg_name'];  
}else{  
    $reg_name = "";  
}
if(isset($_POST['reg_password'])){  
    $reg_password = $_POST['reg_password'];  
}else{  
    $reg_password = "";  
}



if($type == "log"){
	$result = login($log_phone,$log_password);
	if($result == "admin"){
		$authcode =  authcode($log_phone,'ENCODE',$authkey,0);
		$statu = "admin";
		$authdata = array('cookie' => $authcode,'statu' => $statu);
		echo json_encode($authdata);
	}else if($result == "user"){
		$authcode =  authcode($log_phone,'ENCODE',$authkey,0);
		$statu = "user";
		$authdata = array('cookie' => $authcode,'statu' => $statu);
		echo json_encode($authdata);
	}else if($result == "fail"){
		$statu = "no";
		$authdata = array('statu' => $statu);
		echo json_encode($authdata);
	}
}else if($type == "reg"){
	register($reg_phone,$reg_name,$reg_password);
}

?>