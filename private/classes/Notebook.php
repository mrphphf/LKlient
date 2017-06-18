<?php
Class Notebook
{
  //This code is self documenting and if you have a little knowledge of how PDO works you should be fine.
  //It isn't minified or anything either so the variable names should be descriptive enough.
  public static function EditNote($content,$notename,$pdo)
  {
    $queryOne = $pdo->prepare("UPDATE notebook SET content = :content WHERE notename  = :notename");
    $queryOne->execute(["content"=>$content,"notename"=>$notename]);
  } 
  public static function DisplayNotes($pdo)
  {
    $queryOne = $pdo->prepare("SELECT notename FROM notebook");
    $queryOne->execute();
    $result = $queryOne->fetchAll();
    foreach($result as $row)
    {
      echo "<a href='displaynote.php?noteid=".$row["notename"]."'>".$row["notename"]."</a><br>";
    }
  }
  public static function GetNoteContent($notename,$pdo)
  {
    $queryOne = $pdo->prepare("SELECT content FROM notebook WHERE notename = :notename");
    $queryOne->execute(["notename"=>$notename]);
    $result = $queryOne->fetchColumn();

    return $result;
  }
  public static function CreateNote($notename, $content,$pdo)
  {
    $queryOne = $pdo->prepare("INSERT INTO notebook (notename,content) VALUES(:name,:content)");
    $queryOne->execute(["name"=>$notename,"content"=>$content]);
  }
  public static function DestroyNote($notename,$pdo)
  {
    $queryOne = $pdo->prepare("DELETE FROM notebook WHERE notename = :notename");
    $queryOne->execute(["notename"=>$notename]);
  }
}
 ?>
