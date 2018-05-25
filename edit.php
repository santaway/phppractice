<?php
require_once('templates/top.php');
$id=(isset($_GET['id']))?$_GET['id']:0;
$query="SELECT * FROM cabinet
	WHERE id=$id";
	$caf=mysql_query($query);
if(!$caf){
	exit($query);
}
$favs=mysql_fetch_array($caf);
if($_POST){
			$name=trim($_POST['name']);
			$body=trim($_POST['body']);
			$picture='';
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
		$dir=$_SERVER['DOCUMENT_ROUT'].'/media/uploads/';
		@unlink($dir.$favs['picture']);
		$picture=time().'.jpg';
		if(!move_uploaded_file($tmp,$dir.$picture)){
			echo 'Ошибка загрузки файла';
		}
	}
			$query="UPDATE cabinet SET name='$name', picture = '$picture'
			WHERE id='$id'";
			$cat = mysql_query($query);
			if(!$cat){
				exit($query);
			}
			?>
			<script>
			 document.location.href='cabinet.php';
			</script>
			<?php
		}
}
?>
<div class='col-md-6'>	
	<h2>Редактировать</h2>
<form method=POST action='cabinet.php?=<?=$id?>' enctype='multipart/form-data'>
  <div class="form-group">
    <label for="exampleInputEmail1">Название</label>
    <input type="text" class="form-control" id="exampleInputName" placeholder="Name" value="<?=$favs['name']?>" name="name">
  </div>
  <div class="form-group">
    <label for="exampleInputAbout">Описание</label>
    <textarea class="ckeditor" name="body"><?=$favs['body']?></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPrice">Цена</label>
    <input type="text" class="form-control" id="exampleInputPrice" placeholder="price" value="<?=$favs['price']?>" name="price">
  </div>
  <div class="form-group">
    <label for="exampleInputCategory">Категория</label>
    <input type="text" class="form-control" id="exampleInputCategory" placeholder="category" value="<?=$favs['category']?>" name="category">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Изображение</label>
    <input type="file" id="exampleInputFile" value="<?=$favs['picture']?>" name="image">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox">Vip
	  <div class="form-group">
    <label for="exampleInputPassword1">Код продукта</label>
    <input type="text" class="form-control" id="exampleInputCode" placeholder="product_code"value="<?=$favs['product_code']?>" name="product_code">
  </div>
    </label>
  </div>
  <button type="submit" class="btn btn-default">Сохранить</button>
  
</form> 
</div>
<?php
require_once('templates/bottom.php');
?>