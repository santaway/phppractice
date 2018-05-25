<?php
	require_once('templates/top.php');
	if($_GET['url']){
		$file = $_GET['url'];
	}else{
		$file = 'index';
	}
	$query="SELECT*FROM maintexts WHERE url='$file'";
	$adr=mysql_query($query);
	if(!$adr){
		exit($query);
	}
	$tbl=mysql_fetch_array($adr);
	
	?>
	    <div class='col-md-6'>
		<h1>
		<?php echo $tbl['name']?>
		</h1>
		<div>
		<?php echo $tbl['body'];?>
		</div>
		<div class='content'>
		</div>
		</div>
<?php require_once('templates/bottom.php')?>