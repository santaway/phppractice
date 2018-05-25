<?php
require_once('templates/top.php');

if($_GET){
	?>
	<div class='col-md-6'>
	<?php
		$name=(isset($_GET['poisk'])) ? trim($_GET['poisk']) : '';
		$query="SELECT * FROM cabinet WHERE name like'%".$name."%' LIMIT 50";
		$caf=mysql_query($query);
		if(!$caf){
		exit($query);
	}
	echo "<table width=100% border=2>";
	while($favs=mysql_fetch_array($caf)){	
		?>
			<tr>
			<td><? echo $favs['picture'];?></td>
			<td><? echo $favs['name'];?></td>
			<td><? echo $favs['price'];?></td>
			<td>
			<a href='addcart.php?id=<?=$favs['id'];?>'>Добавить в корзину</a>
			<a href='#' class='tovar' data-id='<?=$favs['id']?>'>Просмотр</a>
			</td>
		</tr>
		<?php
		}

	?>
	</table>
	</div>
	<?php
	}
require_once('templates/bottom.php');
?>