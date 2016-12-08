<?php
$db = new mysqli("mysql9.000webhost.com","a3600861_project123","project123","a3600861_project123");


if($db->connect_errno){
	echo "Failed to connect to MySQL: (".$db->connect_errno.") ";
}

?>