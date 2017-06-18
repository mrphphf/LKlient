<?php
	require_once("../private/db/db.php");
	require_once("../private/classes/bundle.php");
	$var = Music::GetSongFilePath("song",$pdo);
	echo $var;
?>