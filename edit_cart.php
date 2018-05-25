<?php
$arc=unserialize($_COOKIE['basket']);
	$arc['id']=$_POST['count'];
	$str=serialize($arc);
	setcookie('basket',$str,time()*3600*2,'/');
	header('localhost:basket.php');
?>