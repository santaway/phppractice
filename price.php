<?php
	require_once('libs/middleware_auth.php');
	require_once('templates/top.php');
?>
<?php
if($_FILES){
	//print_r($_FILES);
	$tmp_name=$_FILES['price']['tmp_name'];
	$name=$_FILES['price']['name'];
	$div=$_SERVER['DOCUMENT_ROOT'].'/media/prices/';
	if(is_uploaded_file($tmp_name)){
		move_uploaded_file($tmp_name,$div.$name);
	$handle=fopen($div.$name,'r');

		while($data=fgetcsv($handle,1000,";")){
				$query="SELECT * FROM catalog WHERE name='".$data[0]."'";
				
				$cat=mysql_query($query);
			if(!$cat){
				exit($query);
			}
			$catalog=mysql_fetch_array($cat);
			if(!$catalog['id']){
				echo"<p state='color:red'>";
				echo 'Не существует'.$data[0];
				echo '</p>';
			}else{
				$cat_id=$catalog['id'];
				//echo $cat_id. '<hr/>';
				$query="SELECT * FROM prices WHERE name='".$data[2]."'";
				$cat=mysql_query($query);
			if(!$cat){
				exit($query);
			}
				$fav=mysql_fetch_array($cat);
			if($fav['id']){
				echo "<p style='color:grey'>";
				echo "Товар <b>".$fav['name']."</b> Обновлен";
				echo "</p>";
			}else{
				$query="INSERT INTO prices (name, price) 
						VALUES ('".$data[2]."', '".$data[3]."')";
				$cat=mysql_query($query);
				if(!$cat){
					exit($query);
				}
				echo "<p style='color:green'>";
				echo "Товар <b>".$data[2]."</b> Добавлен";
				echo "</p>";
			}
			}
		
		}
	}	else{
		echo'Ошибка загрузки файла';
	}
}
?>
<div class='col-md-6'>
<form method=POST enctype='multipart/form-data'>


  <div class="form-group">
    <label for="exampleInputFile">Price</label>
    <input type="file" id="exampleInputFile" name="price">
    <p class="help-block">price formata .csv</p>
  </div>
  <button type="submit" class="btn btn-default">Сохранить</button>
  
</form> 
</div>
<?php
	require_once('templates/bottom.php');
?>