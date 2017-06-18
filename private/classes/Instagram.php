<?php
	Class Instagram
	{
		public static function EditInstagram($username,$pdo)
		{
			$queryOne = $pdo->prepare("UPDATE instagram SET username=:username WHERE id = 1");
			$queryOne->execute(["username"=>$username]);
		}
		public static function GetInstagram($pdo)
		{
			$queryOne = $pdo->prepare("SELECT username FROM instagram WHERE id = 1");
			$queryOne->execute();
			$result = $queryOne->fetchColumn();
			return $result;
		}
	}
?>