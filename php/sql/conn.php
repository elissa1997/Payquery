<?php
	
	$dbName = "test";  
    $conn = @ mysql_connect("127.0.0.1", "root", "root") or die("数据库链接错误");  
    mysql_query("set names 'utf8' "); 
    $flag = mysql_select_db($dbName, $conn);  
     
	date_default_timezone_set('PRC');
    
    function toHtmlcode($content)  
    {  
        return $content = str_replace("\n","<br>",str_replace(" ", "&nbsp;", $content));  
    }
	
?>