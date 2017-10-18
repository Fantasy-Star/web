<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_mymember = "sql304.idcnet.top";
$database_mymember = "dazh_18933666_FantasyStar";
$username_mymember = "dazh_18933666";
$password_mymember = "yang19970730";
$mymember = mysql_pconnect($hostname_mymember, $username_mymember, $password_mymember) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("set names 'utf8'");   
?>