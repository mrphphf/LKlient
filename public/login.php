<?php
	error_reporting(0);
	require_once("../private/db/db.php");
	require_once("../private/classes/bundle.php");
	if(isset($_POST["submit"])){
		$username =  $_POST["username"];
		$password =  $_POST["password"];
		User::Login($username,$password,$pdo);
	}
?>
<form action="login.php" method="post">
	Username:<input type="text" name="username"><br>
	Password:<input type="password" name="password"><br>
	<input type="submit" name="submit" value="Submit">
</form>