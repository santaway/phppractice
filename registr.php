<?php
	require_once('templates/top.php');?>
	<h2>Регистрация<h2>
	<div class='col-md-6'>
	<?php 
	if($_POST){
			$fio=trim($_POST['FIO']);
			$email=trim($_POST['email']);
			$login=trim($_POST['login']);
			$password=trim($_POST['password']);
			$passwordagain=trim($_POST['passwordagain']);
			$error =[];
		if(!$fio){
			$error[]='ФИО для заполнения обязательно';
		}
		if(!$email){
			$error[]='email для заполнения обязательно';
		}
		if(!$login){
			$error[]='Login для заполнения обязательно';
		}
		if(!$password){
			$error[]='password для заполнения обязательно';
		}
		if(!$passwordagain){
			$error[]='passwordagain для заполнения обязательно';
		}
		if($password!=$passwordagain){
			$error[]='Пароли не совпадают';
		}
		if(count($error)>0){
			foreach($error as $one){
				echo"<div style='color:red' class='error'>";
				echo $one;
				echo"</div>";
				}

		}else{
			$query="INSERT INTO users 
			VALUES (null, '$fio', '$login', '$email', '$password', NOW(), NOW(), 'unblock')";
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
	<form action='registr.php' method='POST'>
	<div class="form-group">
    <label for="exampleInputFIO">ФИО</label>
    <input type="text" class="form-control" id="exampleInputFIO" placeholder="ФИО" name=FIO>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name=email>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">login</label>
    <input type="text" class="form-control" id="exampleInputlogin" placeholder="login" name=login>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Пароль</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name=password>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Повторить пароль</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Passwordagain" name=passwordagain>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
<?php require_once('templates/bottom.php')?>