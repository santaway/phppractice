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
<form name="form" action="" method="post">
  <table>
    <tr>
      <td>Цена от:</td>
      <td><input type="text" name="price_start" /> рублей</td>
    </tr>
    <tr>
      <td>Цена до:</td>
      <td><input type="text" name="price_end" /> рублей</td>
    </tr>
    <tr>
      <td colspan="2">Производитель</td>
    </tr>
    <tr>
      <td>Apple</td>
      <td>
        <input type="checkbox" name="manufacturers[]" value="1" />
      </td>
    </tr>
    <tr>
      <td>Acer</td>
      <td>
        <input type="checkbox" name="manufacturers[]" value="2" />
      </td>
    </tr>
    <tr>
      <td>ASUS</td>
      <td>
        <input type="checkbox" name="manufacturers[]" value="3" />
      </td>
    </tr>
    <tr>
      <td>Наличие Wi-Fi:</td>
      <td>
        <input type="checkbox" name="wifi" />
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="submit" name="filter" value="Подобрать ноутбуки" />
      </td>
    </tr>
  </table>
</form>
</body>
<?php
  function addWhere($where, $add, $and = true) {
    if ($where) {
      if ($and) $where .= " AND $add";
      else $where .= " OR $add";
    }
    else $where = $add;
    return $where;
  }
  if (!empty($_POST["filter"])) {
    $where = "";
    if ($_POST["price_start"]) $where = addWhere($where, "`price` >= '".htmlspecialchars($_POST["price_start"]))."'";
    if ($_POST["price_end"]) $where = addWhere($where, "`price` <= '".htmlspecialchars($_POST["price_end"]))."'";
    if ($_POST["manufacturers"]) $where = addWhere($where, "`manufacturer` IN (".htmlspecialchars(implode(",", $_POST["manufacturers"])).")");
    if ($_POST["wifi"]) $where = addWhere($where, "`wifi` = '1'");
    $sql = "SELECT * FROM `my_table`";
    if ($where) $sql .= " WHERE $where";
    echo $sql;
  }
?>