<?php
	require_once("../private/db/db.php");
	session_start();
	require_once("../private/classes/bundle.php");
	User::IsLoggedIn();
	if(isset($_POST["submit"]))
	{
		switch($_GET["function"])
		{
			case "creatuser":
				User::CreateUser($_POST["username"],$_POST["password"],$_POST["name"],$pdo);
				break;
			case "deleteuser":
				User::DeleteUser($_POST["username"],$pdo);
				break;
			case "changepassword":
				User::EditPassword($_POST["username"],$_POST["password"],$pdo);
				break;
			case "changeig":
				Instagram::EditInstagram($_POST["ig"],$pdo);
				break;

		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>settings</title>
</head>
<body>
	<a href="menu.php">go back</a>
	<br>
	<form action="settings.php?function=createuser" method="post">
		<h3>Add User</h3><br>
		Username: <input type="text" name="username"><br>
		Name: <input type="text" name="name"><br>
		Password: <input type="password" name="password"><br>
		<input name="submit" type="submit" value="submit">
	</form><br>
	<form action="settings.php?function=deleteuser" method="post">
		<h3>Delete User</h3><br>
		Username: <input type="text" name="username"><br>
		<input name="submit" type="submit" value="submit"><br>
	</form>
	<form action="settings.php?function=changepassword" method="post">
		<h3>Change a User's Password<h3><br>
		Username: <input type="text" name="username"><br>
		New Password: <input type="password" name="password"><br>
		<input name="submit" type="submit" value="submit"><br>
	</form><br>
	<form action="settings.php?function=changeig" method="post">
		<h3> Change IG that is scraped<h3>
		New IG (must be public): <input type="text" name="ig"><br>
		<input name="submit" type="submit" value="submit"><br>
	</form>
</body>
</html>