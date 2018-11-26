<?php
$server='127.0.0.1';	//require 'DB.php';
$username='root';
$password='root';
$database='help_me_db';
$con=mysqli_connect($server,$username,$password,$database);	////$con=DB::connect("mysql://root:root@localhost/$database");
if(!$con)	//$con->setErrorHandling(PEAR_ERROR_DIE);$db->setFetchMode(DB_FETCHMODE_ASSOC);
	die("can not connect to the database $database on the server $server");
?>