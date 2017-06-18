<?php
	error_reporting(0);
	require_once("../private/db/db.php");
	session_start();
	require_once("../private/classes/bundle.php");
	User::IsLoggedIn();
	if(isset($_POST["submit"]))
	{
		$song = $_POST["song"];
		$filePath = Music::LoadSong($song,$pdo);
	}
	$ig = Instagram::GetInstagram($pdo);
?>
<!DOCTYPE html>
<html>
<head>
	<title>ig</title>
</head>
<body>
<a href="menu.php">go back</a>
<br>
<?php
	//THIS CODE IS NOT MINE THIS CODE IS NOT MINE THIS CODE IS NOT MINE
	//Credits to this guy
	//https://gist.github.com/cosmocatalano/4544576
	function scrape_insta($username) {
	$insta_source = file_get_contents('http://instagram.com/'.$username);
	$shards = explode('window._sharedData = ', $insta_source);
	$insta_json = explode(';</script>', $shards[1]); 
	$insta_array = json_decode($insta_json[0], TRUE);
	return $insta_array;
	}
	//Supply a username
	$my_account = $ig; //cept for this little bit, this is my code
	//Do the deed
	$results_array = scrape_insta($my_account);
	//An example of where to go from there
	$latest_array = $results_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'][0];
	echo 'Latest Photo:<br/>';
	echo '<a href="http://instagram.com/p/'.$latest_array['code'].'"><img src="'.$latest_array['display_src'].'"></a></br>';
?>
<br>
<audio src="<?php echo $filePath;?>" autoplay loop controls>
</audio>
<br>
<form action="ig.php" method="post">
	<select name="song">
		<?php
			Music::DisplaySongs($pdo);
		?>
	</select>
	<input type="submit" name="submit" value="play">
</form>
</body>
</html>