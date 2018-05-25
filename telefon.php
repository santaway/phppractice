<?php
	require_once('templates/top.php');
?>
<div class='col-md-6'>	
<?php
if($_POST){
			$name=trim($_POST['name']);
			$email=trim($_POST['email']);
			$login=trim($_POST['login']);
			$password=trim($_POST['password']);
			$passwordagain=trim($_POST['passwordagain']);
			$error = [];
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
			$query="INSERT INTO telefon 
			VALUES (null, '$name','$email','$login','$password',NOW(),NOW(),'unblock')";
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
<form action='telefon.php' method='POST'>
	<div class="form-group">
    <label for="exampleInputFIO">ФИО</label>
    <input type="text" class="form-control" id="exampleInputFIO" placeholder="ФИО" name=FIO>
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