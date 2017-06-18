<?php
Class User
{
  //this function logs the user in, as this is a client and not a service, we will only be using sha1 level of encryption
  public static function Login($username,$password,$pdo)
  {
    $hashword = sha1($password);
    $queryOne = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = :username AND password = :password");
    $queryOne->execute(["username"=>$username,"password"=>$hashword]);
    $rowNumber = $queryOne->fetchColumn();  
    if($rowNumber === "1") {
      session_start();
      $_SESSION["loggedin"] = 1;
      $_SESSION["username"] = $username;
      header("Location: menu.php");
    } else {
      header("Location: login.php?failedlogin=1");
    }
  }
  //Are you serious?
  public static function Logout()
  {
    session_destroy();
    header("Location: login.php?logggedout=1");;
  }
  //Creates a user, the name is Sadboy by default, so the name argument need not be supplied if you are feeling like a s a d b o y that day.
  public static function CreateUser($username,$password,$name = "Sadboy",$pdo)
  {
    $hashword = sha1($password);
    $queryOne = $pdo->prepare("INSERT INTO users (username,password,name) VALUES(:username,:password,:name)");
    $queryOne->execute(["username"=>$username,"password"=>$hashword,"name"=>$name]);
  }
  //Removes a row from the Users database
  public static function DeleteUser($username,$pdo)
  {
    $queryOne = $pdo->prepare("DELETE FROM users WHERE username = :username");
    $queryOne->execute(["username"=>$username]);
  }
  //Changes a user's password
  public static function EditPassword($username,$newPassword,$pdo)
  {
    $hashword = sha1($newPassword);
    $queryOne = $pdo->prepare("UPDATE users SET password = :password WHERE username = :username");
    $queryOne->execute(["password"=>$hashword,"username"=>$username]);
  }
  public static function IsLoggedIn()
  {
    if($_SESSION["loggedin"] === 0 || !isset($_SESSION["loggedin"]))
    {
      header("Location: login.php");
    } else {
      return true;
    }
  }
}
?>
