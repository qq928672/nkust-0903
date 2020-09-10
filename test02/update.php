<?php   
    $id =$_POST["id"];
    $message =$_POST["message"];
    if($id==NULL){
        header("Location: index.php");
        exit;
    }
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
    //要使用SQL 的 INSERT INTO指令
    $sql = "UPDATE news SET message='$message' WHERE id='$id' LIMIT 1";
    //以下執行SQL查詢指令
    $result = $conn->query($sql);

   $conn->close();
   header("Location: index.php");
   exit;
?>