<?php
	session_start();
	
	// check to see if the user is logged in. if not, redirect to admin page
	if(!isset($_SESSION['admin'])){
		header("Location:index.php?page=admin");
	}
	
	// check to see if the user has subbmitted the add category form
	if(!isset($_SESSION['addcategory']['name'])){
		header("Location:index.php?page=admin");
	}
	
	// enter the new category
	$newcategory_sql = "INSERT INTO category (name) VALUES ('".mysqli_real_escape_string($dbconnect,$_SESSION['addcategory']['name'])."')";
	$newcategory_query = mysqli_query($dbconnect, $newcategory_sql);
	unset($_SESSION['addcategory']['name']);
	?>


<p> new Category has been entered</p><br>
<p><a href="index.php?page=admin">Return to admin panel </a></p>