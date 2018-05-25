<?php
	require_once('config/config.php');
	$id=(isset($_GET['id']))?$_GET['id']:0;
	$query="SELECT * FROM cabinet WHERE id=$id";
	$caf=mysql_query($query);
	if(!$caf){
		exit($query);
		$fav=mysql_fetch_array($caf);
		if(file_exists('/media/uploads/.$fav['picture'])){
			$unlink('/media/uploads/'.$fav['picture']);
		}
		$query="DELETE FROM cabinet WHERE id=$id limit 1";
		$caf=mysql_fetch_array($query);
		if(!$caf){
			exit($query);
		}
		header('location:cabinet.php');
		
?>