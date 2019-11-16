<?php  

include 'connection.php';

$id=$_GET['id'];


$result1=mysqli_query($conn,"SELECT media.ISBN, media.title,authors.author_first_name,authors.author_last_name, categories.category_name, media_type.type_name, media.stock, publishers.publisher_name
								from media
								left join authors 
								on media.fk_authorID=authors.authorID
								left join categories
								on media.fk_categoryID=categories.categoryID
								left join media_type
								on media.fk_typeID=media_type.typeID
								left join publishers
								on media.fk_publisherID=publishers.publisherID

								;");


	$rows = $result1->fetch_all(MYSQLI_ASSOC);

	function updateRecord($conn,$id){
		global $conn;
		$sql="INSERT INTO media join authors on media.fk_authorID = authors.authorID join publishers on media.fk_publisherID=publishers.publisherID
			join categories on media.fk_categoryID=categories.categoryID join media_type on media.fk_typeID=media_type.typeID

			  set title='".$_POST['title']."' , author_first_name='".$_POST['first_name']."',author_last_name='".$_POST['last_name']."', stock=".$_POST['stock'].", publisher_name='".$_POST['publisher_name']."' WHERE media.ISBN=".$id;
		$result=mysqli_query($conn,$sql);
		
	}


	updateRecord($conn,$id);




?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
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
			    <input type="text" class="form-control" name="ISBN" value="<?php echo $id; ?>">
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
			    <input type="text" class="form-control" name="last_name">
			  </div>
			  <div class="form-group">
			    <label>Publisher Name</label>
			    <input type="text" class="form-control" name="publisher_name">
			  </div>
			  <div class="form-group">
			    <label>Stock</label>
			    <input type="number" class="form-control" name="stock">
			  </div>
		
 
			  
  			<button type="submit" class="btn btn-primary">Update</button>
		</form>

	</div>
	<div class="fluid-container">
	<?php include 'footer.php' ?>
	
</div>


	
</body>
</html>
