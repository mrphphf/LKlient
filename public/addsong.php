<?php
	error_reporting(0);
	require_once("../private/db/db.php");
	session_start();
	require_once("../private/classes/bundle.php");
	User::IsLoggedIn();
	if(isset($_POST["submit"]))
	{
		$name = $_POST["name"];
		$filepath = $_POST["filepath"];
		$filetype = $_POST["filetype"];
		Music::AddSong($name,$filepath,$filetype,$pdo);
	}
?>
<a href="menu.php">back</a>
<br>
<h1>Put Music in docroot/lklient/public/music folder</h1>
<br>
<form action="addsong.php" method="post">

	Name: <input name="name" type="text"><br>
	Filepath: <input name="filepath" type="text"><br>
	Filetype: <input name="filetype" type="text"><br>
	<input type="submit" name="submit" value="Submit">
</form>