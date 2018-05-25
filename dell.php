<?php
	require_once('config/config.php');
	$id=(isset($_GET['id']))?$_GET['id']:0;
	$query="SELECT * FROM cabinet WHERE id=$id";
	$caf=mysql_query($query);
	if(!$caf){
		exit($query);
	}
	$fav=mysql_fetch_array($caf);
	$dir=$_SERVER['DOCUMENT_ROOT'].'/media/uploads/'.$fav['picture'];
	
		if(file_exists($dir)) {
			unlink($dir);
		}
		$query="DELETE FROM cabinet WHERE id=$id limit 1";
		$caf=mysql_query($query);
		if(!$caf){ exit($query);
		}
		header('location:cabinet.php');
		
?>