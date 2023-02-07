<?php
include('connection.php');
$id=intval($_GET['id']);
$query="delete from product where id=$id";
mysqli_query($mysqli,$query);
header("Location:view.php");
?>
