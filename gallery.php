<?php
	require_once('templates/top.php');?>
	<div class='col-md-6'>	
	<?php
$query="SELECT*FROM cabinet WHERE userid=".$_SESSION['id'];
$caf=mysql_query($query);
if(!$caf){
	exit($query);
}
echo "<table width=100%>";
while($favs=mysql_fetch_array($caf)){	
if($favs['showhide']=='show'){
		$class='show';
		$showhide="<a href='showhide.php?status=hide&id=".$favs['id']."'>Скрыть</a>";
	}else{
		$showhide="<a href='showhide.php?status=show&id=".$favs['id']."'>Отобразить</a>";
	$class='hide';
	}
 
	?>
	<tr class='<?=$class?>'>
		<td>Фото 4</td>
		<td><? echo $favs['name'];?></td>
		
		
		<td><? echo $favs['price'];?></td>
		<td><? echo $showhide?>
		<a href='dell.php?id=<?=$favs['id'];?>'>Удалить</a>
		<a href='edit.php?id=<?=$favs['id'];?>'>Редактировать</a>
		</td>
	</tr>
</div>
	<?php
}

 ?>
 
 </table>
<?php	
 require_once('templates/bottom.php');
	?>