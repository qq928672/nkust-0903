<?php
    session_start();
    $password= $_POST["password"];
    if($password=="1234"){
        $_SESSION["user_type"]= 1;
    }
    header("Location: index.php");
    exit;
?>