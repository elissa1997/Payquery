<?php
define('ROOT_PATH',dirname(__FILE__));
include("sql/userquery.php");

$type = $_GET['type'];

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

if($type == "admin_get"){
	admin_get($limit,$page,$ser_name);
}
?>