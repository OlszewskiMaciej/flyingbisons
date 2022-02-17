<?php
require_once('database.php');

$database = new Database();
$conn = $database->dbConnection();

$id = $_GET['id'];

if(isset($_POST['submit']))
{

	$title = $_POST['title'];
	$price = $_POST['price'];
		
	$query = "UPDATE `api` SET `title`=:title, `price`=:price WHERE id = $id";
		
	$sth = $conn->prepare($query);
	$sth->bindParam(':title', $title);
	$sth->bindParam(':price', $price);

	$sth->execute();
		
	header('Location: index.php');

}
		
if( $id > 0 )
{
	$sth = $conn->prepare( 'SELECT * FROM api WHERE id = :id' );
	$sth->bindParam( ':id', $id );
	$sth->execute();
	$result = $sth->fetch();
}
?>

<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">

<body>

<form method="post" action="edit.php?id=<?php echo $id; ?>">

	Title: <input type="text" name="title" <?php if( isSet( $result['title'] ) ) { echo 'value="' . $result['title'] . '"'; } ?>><br><br>
	Price: <input type="number" name="price" <?php if( isSet( $result['price'] ) ) { echo 'value="' . $result['price'] . '"'; } ?>><br><br>
	
	<input type="submit" name="submit" value="Edit this" class="btn btn-primary">

</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>