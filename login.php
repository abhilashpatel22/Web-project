<h1>login page</h1>
<form name ="login" method="post" action="index.php?page=admin">
<p>Username : <input name ="username" type="text" maxlength=30 /></p> 
<p>Password  :  <input name ="password" type="password" maxlength=50 /></p>
<?php
	if(isset($_POST['login']) && !isset($_SESSION['admin'])) {
		?>
		<p><span class="error">Incorrect username or password</span></p>
		<?php
		
	}

?>
<p><input type="submit" name="login" value="submit" /></p>
</form>