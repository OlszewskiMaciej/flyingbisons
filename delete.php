<?php
require_once('database.php');

$database = new Database();
$conn = $database->dbConnection();

$id = 0;

	if (isSet ($_GET['id']))
	{
		$id = intval($_GET['id']);
	}

	if ($id > 0)
	{

	$sth = $conn->prepare('DELETE FROM api WHERE id = :id');
	$sth->bindParam(':id', $id);
	$sth->execute();

	header('location: index.php');
} 
