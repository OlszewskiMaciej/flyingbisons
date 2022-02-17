<?php
require_once('database.php');
?>

<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">

</head>

<body>

<a href="add.php"><input type="submit" name="submit" value="Add new one" class="btn btn-primary"></a>

<?php

$database = new Database();
$conn = $database->dbConnection();

$sql = 'SELECT * FROM api ORDER by id ASC';

$sth = $conn->query($sql);

	echo '<table>';
	echo '<tr>';

		echo '<th>ID</th>';
		echo '<th>Title</th>';
		echo '<th>Price</th>';
		echo '<th>Options</th>';

	echo '</tr>';

	foreach( $sth->fetchAll() as $value ) {

		echo '<tr>';

			echo '<td>' . $value['id'] . '</td>';
			echo '<td>' . $value['title'] . '</td>';
			echo '<td>' . $value['price'] . ' USD</td>';
			echo '<td width="170px">
			<a href="delete.php?id=' . $value['id'] . '">Delete</a>
			<a href="edit.php?id=' . $value['id'] . '">Edit</a>';
		echo '</tr>';
	}

echo '</table>';

?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>