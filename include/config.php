<?php
    $servername = "localhost";
    $username = "root";
    $password = "qwe90691";
    $dbname = "bbs";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
?>