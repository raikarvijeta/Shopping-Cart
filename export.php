<?php
include 'db_connect.php';
include 'dbCreate.php';

header('Content-Type: text/csv; charset=utf-8');  
header('Content-Disposition: attachment; filename=data.csv'); 
$output = fopen("php://output", "w"); 
fputcsv($output, array('name', 'price','image','category_id', 'quantity','description','is_featured'));
$query = "SELECT name,price,image,category_id,quantity,description,is_featured FROM products";
$result = $connection->query($query);
	while($row =$result->fetch_assoc())
	{
		fputcsv($output, $row);
	}
	fclose($output);
?> 