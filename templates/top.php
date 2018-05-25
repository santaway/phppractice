<?php
	session_start();
	require_once('config/config.php');
	?>
<!Doctype>
<html>
<head>
	<title>Разработка и оптимизация</title>
	<meta charset='utf-8'>
	<meta name="discription"  content=''>
	<meta name='keywords' content=''>
	<meta name="author" content=''>
	<link type='text/css' rel='stylesheet' href='media/bootstrap/css/bootstrap.min.css' />
	<link type='text/css' rel='stylesheet' href='media/CSS/styles.css' />
	<script src='media/JS/jquery-2.2.0.min.js'>
	</script>
	<script src='media/bootstrap/js/bootstrap.min.js'>
	</script>
	<script src='media/JS/my.js'>
	</script>
	<script src='media/JS/my123.js'>
	</script>
	<script src='media/JS/my111.js'>
	</script>
</head>
<body>

	<nav class='topmenu'>
		<a href='index.php' data-url='media/img/razrabotka.png'>Главная</a>
		<a href='index.php?url=about_company' data-url='media/img/company.jpg' data-title='О компании'>О нашей компании</a>
		<a href='index.php?url=jobs' data-url='media/img/vakansii.jpg' data-title='Вакансии'>Вакансии</a>
		<a href='index.php?url=contact' data-url='media/img/contacts.jpg' data-title='Контакты'>Контакты</a>
		<a href='basket.php' data-url='media/img/basket.jpeg' data-title='Корзина'>Корзина</a>
		<a href='price.php' data-url='media/img/price.jpg' data-title='Цена'>price</a>
		<a href='news.php' data-url='media/img/news.jpg' data-title='Новости' >news</a>
		<a href='poiskovik.php' data-url='media/img/search.jpg' data-title='Поиск'>poisk</a>
		<!--<a href='slideshowformainpage.php'>slide</a> -->
	</nav>
	<div class='header'>
		<img src='media/img/orig.png' class='logo'/>
		<h1 class='logotext'>Разработка и оптимизация сайтов</h1>
			<?php		
			if($_SESSION['id']){
	?>
	<div class="login">
	<a href='cabinet.php'>Кабинет</a>
	<a href='logout.php'>Выход</a>
</div>
<?php
	}else{
?>
<div class="login">
<a href='registr.php'>Регистрация</a>
<a href='login.php'>Авторизация</a>
</div>
<?php
	}
	?>
		<form class='form-horizontal' name='poisk' action='search.php' method='get'>
		<input class="input-search" type='search' name='poisk' placeholder='Поиск по товарам'/>
		<input class="button-ok" type='submit' value='OK'/>
		</form>


	</div>
	<div class='empty' data-title='Разработка и оптимизация сайтов'>
	</div>

	<div class='main'>
		<div class='col-md-3'>
		<a href='development.php'	class='btn btn-success btn-block'>	Разработка сайтов </a>
				<a href='promotion.php'	class='btn btn-success btn-block'>	Продвижение </a>
						<a href='testing.php'	class='btn btn-success btn-block'>	Тестирование </a>
								<a href='optimization.php'	class='btn btn-success btn-block'>	Оптимизация </a>
		</div>