<?php
	require_once('templates/top.php');
	if(isset($_COOKIE['basket'])){
		$arc=unserialize($_COOKIE['basket']);	
?>
<div class='col-md-6'>	
<table width=100% border="1">
<tr>
 <td>Picture</td>
 <td>Name</td>
 <td>Price</td>
 <td>Count</td>
 <td>Summa</td>
 <td>Action</td>
</tr>
<?php
		foreach($arc as $key =>$value){
			$query="SELECT * FROM cabinet WHERE id=".$key;
			$cat=mysql_query($query);
			if(!$cat){
				exit($query);
			}
			$fav=mysql_fetch_array($cat);
			$summa=$fav['price']=$value;
			$itogo+=$summa;
			?>
			<tr>
				<td>
					<?=(isset($fav['picture'])) ? "<img width=200px src='media/uploads/".$fav['picture']."'/>" : "<img src='media/no_photo.jpg'/>"?>
				</td>
				<td>
					<?=$fav['name'];?>
				</td>
				<td><?=$fav['price'];?></td>
				<td><input type='number' name='count' form='basket_count' value=<?=$value?> /></td>	
				<td><?=$fav['summa'];?></td>
				<td><a href='cart_dell.php?id=<?=$fav['id'];?>'>Удалить</a>
				<form name='basket_count' method='POST'	action='edit_cart.php?id=<?=$fav['id'];?>'>
					<input type='submit' value='Редактировать'/>
				</form>
				</td>
			</tr> 
			
			<?php
		}
		echo "</table>";
	}else{
		echo '<p class="nothave">Ваша корзина пуста</div>';
	}		
		if($_POST){
			
			$name=trim($_POST['name']);
			$email=trim($_POST['email']);
			$phone=trim($_POST['phone']);
			$error = [];
		if(!$name){
			$error[]='Имя для заполнения обязательно';
		}
		if(!$email){
			$error[]='email для заполнения обязательно';
		}
		if(!$phone){
			$error[]='Телефон для заполнения обязательно';
		}
		if(count($error)>0){
			foreach($error as $one){
				echo"<div style='color:red' class='error'>";
				echo $one;
				echo"</div>";
				}

		}else{
			if($_SESSION['id']){
				$user = $_SESSION['id'];
			}else{
				$user = 0;
			}
			$query="INSERT INTO telefon VALUES (
			null, 
			'$name',
			'$email',
			'$phone',
			'".$_COOKIE['basket']."',
			'new',
			'$user'
			)";  
			$caf=mysql_query($query);
			if(!$caf){
				exit($query);
			}
			header('location:libs/cookie_dell_all.php');

		}
	}
?>
<form  method='POST' class="col-md-6">
	<div class="form-group">
    <label for="exampleInputFIO">Имя</label>
    <input type="text" class="form-control" id="exampleInputName" placeholder="Имя" name='name'>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name=email>
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Phone</label>
    <input type="text" class="form-control" id="exampleInputPhone" placeholder="Phone" name=phone>
  </div>
  <button type="submit" class="btn btn-default">Подтвердить</button>
</form>
</div>

<?php
	require_once('templates/bottom.php');
?>