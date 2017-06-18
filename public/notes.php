<?php
	error_reporting(0);
	require_once("../private/db/db.php");
	require_once("../private/classes/bundle.php");
	session_start();
	User::IsLoggedIn();
	if($_GET["function"] === "createnote")
	{
		Notebook::CreateNote($_POST["title"],"",$pdo);
		header("Location: displaynote.php?noteid=".$_POST["title"]);
	}
	if(isset($_POST["submit"])){
		$filepath = Music::LoadSong($_POST["song"],$pdo);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Note Page</title>
</head>
<body>
<a href="menu.php">go back</a>
<br>
<?php
Notebook::DisplayNotes($pdo);
?>
<form action="notes.php?function=createnote" method="post">
	Title: <input type="text" name="title"><br>
	<input name="submit" value="Create" type="submit">
</form>
<br>
<audio src="<?php echo $filepath;?>" autoplay controls loop></audio>
<form action="notes.php" method="post">
	<select name ="song">
		<?php
			Music::DisplaySongs($pdo);
		?>
	</select>
	<input type="submit" name="submit" value="play">
</form>
</body>
</html>