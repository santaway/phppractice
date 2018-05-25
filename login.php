<?php
	
	require_once('templates/top.php');?>

	<div class='col-md-6'>	
	<h2>Авторизация<h2>
	<?php 
	if($_POST){
		$login=trim($_POST['login']);
		$password=trim($_POST['password']);
		$query="SELECT * FROM users WHERE login='$login' AND password='$password'";
		$caf=mysql_query($query);
		if(!$caf){
			exit($query);
		}	
?>		<script>
			document.location.href='index.php';
			</script>
			<?php
		
		$res=mysql_fetch_array($caf);
		if($res['id']){
		$_SESSION['id']=$res['id'];
		}
	else{
		echo"<div class='error' style='color:red'>Пользователь с таким логином и паролем не найден</div>";
		
	}		
	}	
	?>
	
	<form action='login.php' method='POST'>
  <div class="form-group">
    <label for="exampleInputPassword1">Логин</label>
    <input type="text" class="form-control" id="exampleInputlogin" placeholder="login" name=login>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Пароль</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name=password>
  </div>
  
  <button type="submit" class="btn btn-default">Войти</button>
</form>
</div>
<?php require_once('templates/bottom.php')?>