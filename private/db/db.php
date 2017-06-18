<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=lklient', "root", "");
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
