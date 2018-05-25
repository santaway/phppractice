<?php
$id=(isset($_GET['id']))?$_GET['id']:0;
if($_COOKIE['basket']){
	$arc=unserialize($_COOKIE['basket']);
	unset($arc[$id]);
	$str=serialize($arc);
	setcookie('basket',$str,time()*3600*2,'/');
	header('location:basket.php');
}else{
	echo 'Ошибка';
}
?>