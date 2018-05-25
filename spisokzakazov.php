<<?php
	require_once('templates/top.php');
	if(isset($_COOKIE['basket'])){
		$arc=unserialize($_COOKIE['basket']);	
?>
<div class='col-md-6'>	
<h2>Ваши заказы</h2>
<table width=100% border=2>
<tr>
 <td>FIO</td>
 <td>Email </td>
 <td>Телефон</td>
 <td>Фото</td>
 <td>Name</td>
 <td>Заказ</td>
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
					<?=$fav['FIO'];?>
				</td>
				<td>
					<?=$fav['email'];?>
				</td>
				<td>
					<?=$fav['telefon'];?>
				</td>
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
				<form name='basket_status' method='POST'	action='edit_cart.php?id=<?=$fav['id'];?>'>
					<input type='submit' value='Статус'/>
				</td>
			</tr> 
			
			<?php
		}
		echo "</table>";
	}else{
		echo 'Ваша корзина пуста';
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
			header('location:libs/cookie_all_dell.php');

		}
	}
?>
</div>
<?php
	require_once('templates/bottom.php');
?>