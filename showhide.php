<?php
	require_once('config/config.php');
		$id=(isset($_GET['id']))?$_GET['id']:0;
		$showhide=$_GET['status'];
		$query="UPDATE cabinet SET	showhide='$showhide'WHERE id=$id";
		$caf=mysql_query($query);
		if(!$caf){
			exit($query);
		}
		header('location:cabinet.php');
?>