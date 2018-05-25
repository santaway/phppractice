<?php  
include 'safemysql.class.php';
$db    = new SafeMysql();
$table = "test"; 

if($_SERVER['REQUEST_METHOD']=='POST') {
  if (isset($_POST['delete'])) {
    $db->query("DELETE FROM ?n WHERE id=?i",$table,$_POST['delete']);
  } elseif ($_POST['id']) { 
    $db->query("UPDATE ?n SET name=?s WHERE id=?i",$table,$_POST['name'],$_POST['id']);
  } else { 
    $db->query("INSERT INTO ?n SET name=?s",$table,$_POST['name']);
  } 
  header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);  
  exit;  
}  
if (!isset($_GET['id'])) {
  $LIST = $db->getAll("SELECT * FROM ?n",$table);
  include 'list.php'; 
} else {
  if ($_GET['id']) {
    $row = $db->getRow("SELECT * FROM ?n WHERE id=?i",$table,$_GET['id']);
    foreach ($row as $k => $v) $row[$k]=htmlspecialchars($v); 
  } else { 
    $row['name']=''; 
    $row['id']=0; 
  } 
  include 'form.php'; 
}
?>
<a href="?id=0">Add item</a>
<? foreach ($LIST as $row): ?>
<li><a href="?id=<?=$row['id']?>"><?=$row['name']?></a>
<? endforeach ?>
<form method="POST">
<input type="text" name="name" value="<?=$row['name']?>"><br>
<input type="hidden" name="id" value="<?=$row['id']?>">
<input type="submit"><br>
<a href="?">Return to the list</a>
</form>
<? if ($row['id']):?>
<div align=right>
<form method="POST">
<input type="hidden" name="delete" value="<?=$row['id']?>">
<input type="submit" value="Удалить"><br>
</form>
</div>
<?endif?>