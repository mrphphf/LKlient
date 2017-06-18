
<?php
	error_reporting(0);	
	require_once("../private/db/db.php");
	session_start();
	require_once("../private/classes/bundle.php");
	User::IsLoggedIn();
?>
<!DOCTYPE html>
<html>
<head>
	<title>menu</title>
</head>
<body>
<a href="ig.php">ig</a><br>
<a href="notes.php">notes</a><br>
<a href="addsong.php">addsong</a><br>
<a href="settings.php">settings/admin</a><br>
<a href="logout.php">logout</a>
</body>
</html>