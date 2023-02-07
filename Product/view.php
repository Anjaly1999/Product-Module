<!DOCTYPE html>
<html>
<head>
	
	
	  <link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<style type="text/css">
	body{
		background-color: pink;
	}
	h1
	{
		color:orangered;
	}
</style>
</head>
<body>
	<h1 align="center">Product Details</h1><br>
	<table border="1 " color="red" align="center">
		<tr>
			<th>SI NO</th>
			<th>Name</th>
			<th>Image</th>
			<th>Price</th>
			
			
		</tr>
		<?php
				include('connection.php');
				$result="select * from product";
				$query=mysqli_query($mysqli,$result);
				while ($row=mysqli_fetch_assoc($query)) 
				{
				
				?>
				<tr>
					<td><?php echo $row['id'];?></td>
					<td><?php echo $row['name'];?></td>
					<td><img src="image/<?php echo $row['image'];?>" width="50px" height="50px"></td>
					<td><?php echo $row['price'];?></td>
					
					 <td><a href="index.php?id=<?php echo $row['id'];?>">Edit</a></td>
					 <td><a href="delete.php?id=<?php echo $row['id'];?>">Delete</a></td>
					 

					
					<?php
				       }
					?>
				</tr>
	</table>
	<br>
	<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="index.php">Previous</a></li>
    <li class="page-item"><a class="page-link" href="index.php">Add</a></li>
    <li class="page-item"><a class="page-link" href="index.php">Next</a></li>
  </ul>
</nav>

</body>
</html>
