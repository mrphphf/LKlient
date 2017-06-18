<?php
Class Music
{
  //So the way the music class works, the user can store their music whereever they want, eg, I am too lazy to use that move files function or whatever.
  //This application was ddesigned.
  public static function AddSong($songName,$filePath,$fileType = "mp3",$pdo)
  {
    $queryOne = $pdo->prepare("INSERT INTO music (songname, filepath, filetype) VALUES(:songname,:filepath,:filetype)");
    $queryOne->execute(["songname"=>$songName,"filepath"=>$filePath,"filetype"=>$fileType]);
  }
  public static function LoadSong($songName,$pdo)
  {
      $queryOne = $pdo->prepare("SELECT filepath FROM music WHERE songname = :songname");
      $queryOne->execute(["songname"=>$songName]);
      $adBoys = $queryOne->fetchAll();
      foreach ($adBoys as $row) {
        $filePath = $row["filepath"];
      }
      return $filePath;
  }
  public static function DeleteSong($songName,$pdo)
  {
    $queryOne = $pdo->prepare("DELETE FROM music WHERE songname = :songname");
    $queryOne->execute(["songname"=>$songName]);
  }
  public static function DisplaySongs($pdo)
  {
    foreach($pdo->query("SELECT * FROM music") as $row) {
      $songName = $row["songname"];
      $filePath = $row["filepath"];
      $fileType = $row["filetype"];
      echo "<option value='".$songName."'>".$songName."</option>"; 
    }

  }
  public static function GetSongFilePath($songname,$pdo)
  {
    $queryOne = $pdo->prepare("SELECT filepath FROM music where songname = :songname");
    $queryOne->execute(["songname"=>$songname]);
    $result = $queryOne->fetchColumn();
    return $result;
  }
  public static function EditSongName($songName,$newSongName,$pdo)
  {
    $queryOne = $pdo->prepare("UPDATE music SET songname = :new WHERE songname = :songname");
    $queryOne->execute(["new"=>$newSongName,"songname"=>$songName]);
  }
  public static function EditSongFilePath($songName,$songFilePath,$pdo)
  {
    $queryOne = $pdo->prepare("UPDATE music SET filepath = :new WHERE songname = :songname");
    $queryOne->execute(["new"=>$songFilePath,"songname"=>$songName]);
  }
  public static function EditSongFileType($songName,$songFileType,$pdo)
  {
    $queryOne = $pdo->prepare("UPDATE music SET filetype = :new WHERE songname = :songname");
    $queryOne->execute(["new"=>$songFileType,"songname"=>$songName]);
  }
  public static function UploadAndHandleSong($fileHandle)
  {
    
  }
}
 ?>
