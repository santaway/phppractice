<?php 
	require_once('libs/middleware_auth.php');
	require_once('templates/top.php');
	
?>
<div class='col-md-6'>	
	<h2>Кабинет пользователя</h2>
<?php
	if($_POST){
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
	}
?>
<?php

?>
<?php 
	if($_POST){
			$name=trim($_POST['name']);
			$body=trim($_POST['body']);
			$picture=trim($_FILES['picture']);
			$price=trim($_POST['price']);
			$category=trim($_POST['category']);
			$product_code=trim($_POST['product_code']);
	
			$error = [];
		if(!$name){
			$error[]='Название для заполнения обязательно';
		}
		if(!$body){
			$error[]='Описание для заполнения обязательно';
		}
		if(!$price){
			$error[]='Цена для заполнения обязательно';
		}
		if(!$category){
			$error[]='category для заполнения обязательно';
		}
		if(!$product_code){
			$error[]='product_code для заполнения обязательно';
		}
		if(count($error)>0){
			foreach($error as $one){
				echo"<div style='color:red' class='error'>";
				echo $one;
				echo"</div>";
				}

		}else{ 
	if($_FILES){
		$tmp=$_FILES['picture']['tmp_name'];
		$dir=$_SERVER['DOCUMENT_ROUT'].'/media/img/';
		$picture=time().'.jpg';
		if(!move_uploaded_file($tmp,$dir.$picture)){
			echo 'Ошибка загрузки файла';
		}
	}
			/* $query="INSERT INTO product 
			 ('name','body','price','category','product_code')
			 VALUE('$name','$body','$price','$category','$product_code')"; */
			 $query="INSERT INTO cabinet 
			 VALUES(null, '$name','$body','$price', '$category', '$picture', '1', 'show', '$product_code', ".$_SESSION['id'].", NOW() )";
			$caf=mysql_query($query);
			if(!$caf){
				exit($query);
			}
			?>
			<script>
			document.location.href='index.php';
			</script>
			<?php 
		}
	}
	?>
<script src='media/ckeditor/ckeditor.js'>
</script>
<form method=POST action='cabinet.php' enctype='multipart/form-data'>
  <div class="form-group">
    <label for="exampleInputEmail1">Название</label>
    <input type="text" class="form-control" id="exampleInputName" placeholder="Name" name="name">
  </div>
  <div class="form-group">
    <label for="exampleInputAbout">Описание</label>
    <textarea class="ckeditor" name="body"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPrice">Цена</label>
    <input type="text" class="form-control" id="exampleInputPrice" placeholder="price" name="price">
  </div>
  <div class="form-group">
    <label for="exampleInputCategory">Категория</label>
    <input type="text" class="form-control" id="exampleInputCategory" placeholder="category" name="category">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Изображение</label>
    <input type="file" id="exampleInputFile" name="image">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox">Vip
	  <div class="form-group">
    <label for="exampleInputPassword1">Код продукта</label>
    <input type="text" class="form-control" id="exampleInputCode" placeholder="product_code" name="product_code">
  </div>
    </label>
  </div>
  <button type="submit" class="btn btn-default">Сохранить</button>
  
</form> 

<?php
$query="SELECT*FROM cabinet WHERE userid=".$_SESSION['id'];
$caf=mysql_query($query);
if(!$caf){
	exit($query);
}
echo "<table width=100% border=2>";
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
		<td><? echo $favs['picture'];?></td>
		<td><? echo $favs['name'];?></td>
		<td><? echo $favs['price'];?></td>
		<td><? echo $showhide?>
		<a href='dell.php?id=<?=$favs['id'];?>'>Удалить</a>
		<a href='edit.php?id=<?=$favs['id'];?>'>Редактировать</a>
		<a href='addcart.php?id=<?=$favs['id'];?>'>Добавить в корзину</a>
		<a href='#'class='tovar' data-id='<?=$favs['id']?>'>Просмотр</a>
		</td>
	</tr>

	<?php
}

 ?>
 
 </table>
 
 </div>
<?php
	require_once('templates/bottom.php');
?>
