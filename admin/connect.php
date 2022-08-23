<?php
//Connection
mysql_connect("localhost", "root", "") or die("Cannot Connect to server");
$db_conn=mysql_select_db("emarket") or die("Cannot Select Database");

?>