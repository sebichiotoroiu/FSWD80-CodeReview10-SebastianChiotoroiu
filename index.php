<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Home page</title>
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
	
	include 'header.php';
	include 'connection.php';

	$result=mysqli_query($conn,"SELECT images.photo, media.title, media.price,authors.author_first_name,authors.author_last_name,media.description, media.stock, categories.category_name, media.ISBN, publishers.publisher_name 
								from media
								left join authors 
								on media.fk_authorID=authors.authorID
								left join images
								on images.photoID=media.fk_photoID
								left join categories
								on categories.categoryID=media.fk_categoryID
								left join publishers
								on publishers.publisherID=media.fk_publisherID;");



	$rows = $result->fetch_all(MYSQLI_ASSOC);
	?>

	<div class="container my-5">
		<div class="row my-5">
			

	<?php
	foreach ($rows as $key ) {
		echo '<div class="col-lg-4 my-4"><div class="card" style="width: 18rem;">'.'<img src="data:image/jpeg;base64,'.base64_encode($key['photo']).'"/><div class="card-body"><h5 class="card-title">'.$key["title"].'</h5><p class="card-text">Author: '.$key["author_first_name"].' '.$key["author_last_name"].'<p class="card-text">Price (Eur): '.$key["price"].'<br><a href="#" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModalLong'.$key["ISBN"].'">Details</a></div></div></div><div class="modal fade" id="exampleModalLong'.$key["ISBN"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"><div class="modal-dialog modal-lg" role="document"><div class="modal-content"><div class="modal-body"><div class="row"><div class="col-lg-6"><img src="data:image/jpeg;base64,'.base64_encode($key['photo']).'" /></div><div class="col-lg-6"><h5>'.$key["title"].'</h5><p>Author: '.$key["author_first_name"].' '.$key["author_last_name"].'</p><p>Description:'.$key["description"].'</p><p>Price (Eur): '.$key["price"].'</p><p>Stock: '.$key["stock"].'</p><p>Category: '.$key["category_name"].'</p><p>ISBN: '.$key["ISBN"].'</p><p>Publisher: '.$key["publisher_name"].'</p></div></div></div></div></div></div></div></div></div></div>';
	}
	?>

		</div>
		
	</div>


	<?php include 'footer.php' ?>
	


</body>
</html>