<?php
	error_reporting(0);
	require_once("../private/db/db.php");
	session_start();
	require_once("../private/classes/bundle.php");
	User::IsLoggedIn();
	if(isset($_POST["submit"]))
	{
		$username = $_POST["username"];
		$password = $_POST["password"];
		User::CreateUser($username,$password);
		header("Location: menu.php");
	}
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
<form method="post" action="creatuser.php">
	Username:<input type="text" name="username"><br>
	Password:<input type="password" name="password"><br>
	<input type="submit" name="submit" value="create">
</form>
</body>
</html>