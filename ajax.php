<?php
	require_once('config/config.php');
?>
<?php
	print_r($_POST);
	$query="SELECT * FROM cabinet WHERE id=".$_POST['id'];
	$cat=mysql_query($query);
	if(!$cat){
		exit($query);
	}
	$fav=mysql_fetch_array($cat);
	echo '<h2>'.$fav['name']."<h2>";
	if($fav['picture']){
		echo "<img src='media/img/".$fav['picture']."' width=100% />";
	}else{
		echo "-";
	} 
	echo $fav['body'];
	
?>