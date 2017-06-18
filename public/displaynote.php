<?php
  
  require_once("../private/db/db.php");
  session_start();
  require_once("../private/classes/bundle.php");
  User::IsLoggedIn();
  if(isset($_POST["submit"]))
  {
    Notebook::EditNote($_POST["sadboys"],$_GET["noteid"],$pdo);
  }
  if(isset($_POST["deletenote"]))
  {
    Notebook::DestroyNote($_GET["noteid"],$pdo);
    header("Location: notes.php?notedeleted=1");
  }
  if(isset($_POST["play"]))
  {
    Notebook::EditNote($_POST["sadboys"],$_GET["noteid"],$pdo);
    $filepath = Music::LoadSong($_POST["song"],$pdo);
  }
  $noteContent = Notebook::GetNoteContent($_GET["noteid"],$pdo);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $_GET["noteid"];?></title>
  </head>
  <body>
  <?php
    if($_GET["notedeleted"] == 1) 
    {
      echo "Note has been sucessfully deleted. <br>";
    }
  ?>
  <a href="notes.php">go back</a>
    <form method="post" action="displaynote.php?noteid=<?php echo $_GET["noteid"]; ?>">
    </form>
    <form method="post" action="displaynote.php?noteid=<?php echo $_GET["noteid"]; ?>">
      <input type="submit" value="Delete" name="deletenote">
    </form>
    
    <form action="displaynote.php?noteid=<?php echo $_GET["noteid"]; ?>" method="post">
        <textarea width="320" height="160" name="sadboys" value="<?php echo $noteContent;?>"><?php echo $noteContent;?></textarea>
        <br>
        <br>
       <audio src="<?php echo $filepath;?>" autoplay controls loop></audio>
       <br> 
      <select name ="song">
        <?php
          Music::DisplaySongs($pdo);
        ?>
      </select>
    <input type="submit" name="submit" name="submit">
    <br>
    <input type="submit" name="play" value="play and submit">
  </form>
  </body>
</html>
