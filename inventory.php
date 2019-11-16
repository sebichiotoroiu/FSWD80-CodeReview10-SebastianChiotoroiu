<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Inventory</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body> 
 <?php
	include 'connection.php';


	$result=mysqli_query($conn,"SELECT media.ISBN, media.title,authors.author_first_name,authors.author_last_name,media.title, categories.category_name, media_type.type_name, media.stock, publishers.publisher_name, orders.amount, orders.details
								from media
								left join authors 
								on media.fk_authorID=authors.authorID
								left join categories
								on media.fk_categoryID=categories.categoryID
								left join media_type
								on media.fk_typeID=media_type.typeID
								left join publishers
								on media.fk_publisherID=publishers.publisherID
								left join orders
								on media.fk_orderID=orders.orderID

								;");


	$rows = $result->fetch_all(MYSQLI_ASSOC);

?>

<div class="fluid-container"> <?php include 'header.php'; ?></div>

<div class="container my-5">
	<table class="table">
  <thead>
    <tr>
      <th scope="col">ISBN</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Publisher</th>
      <th scope="col">Category</th>
      <th scope="col">Type</th>
      <th scope="col">Stock</th>
      <th scope="col">Amount</th>
      <th scope="col">Details</th>
      <th scope="col">Edit/Delete</th>
    </tr>
  </thead>
  <tbody>

<?php

	foreach ($rows as $key ) {

		echo '<tr><td>'.$key["ISBN"].'</td><td>'.$key["title"].'</td><td>'.$key["author_first_name"].' '.$key["author_last_name"].'</td><td>'.$key["publisher_name"].'</td><td>'.$key["category_name"].'</td><td>'.$key["type_name"].'</td><td>'.$key["stock"].'</td><td>'.$key["amount"].'</td><td>'.$key["details"].'</td><td><button class="btnd"><a href="delete.php?id='.$key["ISBN"].'">Delete</a></button><button class="btnu ml-2"><a href="edit.php?id='.$key["ISBN"].'">Edit</a></button></td></tr>';

	}


?>
</tbody>
</table>
</div>

<div class="fluid-container">
	<?php include 'footer.php' ?>
	
</div>
	
</body>
</html>