<?php   
    $id =$_GET["id"];
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
    //要使用SQL 的 SELECT 指令
     $sql = "SELECT * from news WHERE id='$id' LIMIT 1";
    //以下執行SQL查詢指令
    $result = $conn->query($sql);
    if ($result->num_rows > 0) { //檢查紀錄的數目看看是不是有資料
          $row = $result->fetch_assoc();
          $id= $row["id"];
          $message=  $row["message"];
          echo"以下是我找到的訊息請修改";
          echo"<form method=POST action=update.php>";
          echo"<input type=hidden value=$id name=id>";
          echo"訊息:<input type=text value=$message name=message size:30>";
          echo "<input type=submit value=修改>";
          echo"</form>";
          echo "<a href='index.php'>不修改直接回去</a>";
     } else {
             echo "找不到你要編輯的紀錄";
             echo "<a href='index.php'>回上頁</a>";
            }
   $conn->close();
   exit;
?>