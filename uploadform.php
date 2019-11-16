
<?php 

include 'connection.php';


	if(!empty($_POST['ISBN'])&& !empty($_POST['title']) && !empty($_POST['first_name']) && !empty($_POST['last_name'])){
		$sql = "INSERT INTO media(ISBN,title) VALUES ('".$_POST['ISBN']."','".$_POST['title']."')";

	$sql1 = "INSERT INTO authors(author_first_name,author_last_name) VALUES ('".$_POST['first_name']."','".$_POST['last_name']."')";

	$sql2 = "INSERT INTO media_type(type_name) VALUES ('".$_POST['type']."')";

	$sql3 = "INSERT INTO categories(category_name) VALUES ('".$_POST['category']."')";

	$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
	$query = "INSERT INTO images(photo) VALUES ('$file')";
	

	if (mysqli_query($conn, $sql) &&  mysqli_query($conn, $sql1) &&  mysqli_query($conn, $sql2) &&  mysqli_query($conn, $sql3) &&   mysqli_query($conn, $query)){
   		echo '<script>console.log("New record created.")</script>';
	} else {
   	echo '<script>console.log("Error the new record was not created.")</script>';
	}

	}






?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Upload Form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="fluid-container"> <?php include 'header.php'; ?></div>

	<div class="container my-5">
		<form method="POST" enctype="multipart/form-data">
  			  <div class="form-group">
			    <label>ISBN</label>
			    <input type="text" class="form-control" name="ISBN">
  			  </div>
			  <div class="form-group">
			    <label>Title</label>
			    <input type="text" class="form-control" name="title">
			  </div>
			   <div class="form-group">
			    <label>Author First Name</label>
			    <input type="text" class="form-control" name="first_name">
			  </div>
			  <div class="form-group">
			    <label>Author Last Name</label>
			    <input type="text" class="form-control"  name="last_name">
			  </div>
			  <div class="form-group">
				    <label>Type</label>
				    <select class="form-control" name="type">
				      <option>Book</option>
				      <option>Music</option>
				      <option>Movie</option>
				    </select>
  				</div>
  				 <div class="form-group">
				    <label>Category</label>
				    <select class="form-control" name="category">
				      <option>Novel</option>
				      <option>Fiction</option>
				      <option>SF</option>
				      <option>Horror</option>
					  <option>Children</option>
					  <option>Rock</option>
				    </select>
  				</div>
  				<div class="form-group"><input type="file" name="image" id="image" /> </div>
			  
  			<button type="submit" class="btn btn-primary">Upload</button>
		</form>
		
	</div>
	<div class="fluid-container"> <?php include 'footer.php'; ?></div>
	
</body>
</html>