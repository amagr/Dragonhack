<?php 	
	include "config.php";

	$sql = mysqli_query($link, "SELECT * FROM school;");
	$row = mysqli_fetch_row($sql);

	print_r($row);
?>