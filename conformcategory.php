<?php
	session_start();
	
	// check to see if the user is logged in. if not, redirect to admin page
	if(!isset($_SESSION['admin'])){
		header("Location:index.php?page=admin");
	}
	
	// check to see if the user has subbmitted the add category form
	if(!isset($_POST['submit'])){
		header("Location:index.php?page=admin");
	}
	//set addcategory session
	
	$_SESSION['addcategory']['name'] = $_POST['name'];
	
?>	

<h1>Conform Category Name</h1><br>
<p>You entered: <?php echo $_POST['name']; ?> </p><br>

<p><a href="index.php?page=entercategory">correct, continue</a> | <a href="index.php?page=addcategory">Oops, go back</a></p>