<?php 
error_reporting(~E_DEPRECATED & ~E_NOTICE);

define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','eneza_db');
/*
$conn = mysqli_connect('localhost' ,'root','');
$dbcon= mysqli_select_db('interndb');*/
$conn=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME)or die("can not connect");
$dbcon= mysqli_select_db($conn,DBNAME);

if(!$conn)
{
	die("Connection failed : ". mysqli_error($conn));
}else
{
	// echo "Database successfully connected<br>";
}

if(!$dbcon)
{
	die("Database Connection failed : ". mysqli_error($conn));
}else
{
	// echo "Database successfully connected";
}






?>