<?php
include('connection.php');
$id = isset($_GET['id']) ? $_GET['id'] : '';
        if($id)
    {
      $query="select * from product where id=$id";
      $result=mysqli_query($mysqli,$query);
      $row = mysqli_fetch_assoc($result);
      $id=$row['id'];
      $name=$row['name'];
      $image=$row['image'];
      $price=$row['price'];
      
      
}
if (isset($_POST['submit'])) {
  $name=$_POST['name'];
  $image=$_FILES['image']['name'];
  move_uploaded_file($_FILES['image']["tmp_name"],"image/".$image);
  $price=$_POST['price'];
 
  if($id){
      $query="update product set name='$name',image='$image', price='$price' where id=$id";

        mysqli_query($mysqli,$query);
        header("Location:view.php");
      }
      else{
  $result="insert into product(name,image,price)values('".$name."','".$image."','".$price."')";
  mysqli_query($mysqli,$result);
  header("Location:view.php");
}
}
  ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<style type="text/css">
  body
  {
    background-color: green;
  }
  h1{
    color: skyblue;
  }
</style>
</head>
<body>
  <center>
	<form method="post" action="" enctype="multipart/form-data">
    <h1>Add a Product</h1>
<table align=>
	<tr><td>Name</td><td><input type="text" name="name" value="<?php if(isset($name))echo $name;?>"></td></tr>
	<tr><td>Image</td><td><input type="file" name="image"  value="<?php if(isset($image))
	echo $image;?>"></td></tr>
	<tr><td>Price</td><td><input type="text" name="price" value="<?php if(isset($price))
	echo $price;?>"></td></tr>
	
		<tr><td><input type="submit" name="submit" value="submit"></td></tr>
</table>
<br>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="view.php">Previous</a></li>
     
    <li class="page-item"><a class="page-link" href="view.php">Next</a></li>
  </ul>
</nav>
</form>
</center>
</body>
</html>