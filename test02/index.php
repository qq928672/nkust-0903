<?php
  session_start();
  $user_type= $_SESSION["user_type"];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body{
            
            font-family:標楷體;
            background-color:#F5EFFF;
            background-image:url('https://cdn.pixabay.com/photo/2020/02/11/17/00/cat-4840313_960_720.jpg');
            background-size:cover;    
        }
        h2{
            text-align:center;
            font color :#FFFFFF;
        }
        .cla{
            font-family:fantasy;
            height:137px;
            width:960px;
            text-align:center;
            line-height:137px;
            border-radius:50px;
          
        }    
    </style>    
    <title>蔡承翰0903</title>
</head>
<body>
    <?php include "../include/menu.php" ;?>
    <div class="cla">
    <h2>心情來這說留言板</h2>
    </div> 
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

$sql = "SELECT * FROM news order by id desc";

//以下執行SQL查詢指令
$result = $conn->query($sql);
//以下建立一個用來輸入密碼的表單
//使用者按下登入之後，即會前往chkpass.php檢查密碼
if($user_type==NULL){//如果還沒登入的話，顯示登入用表單
echo"<form method=POST action=chkpass.php>";
          echo "張貼密碼<input type=password name=password>";
          echo"<input type=submit value=登入>";
          echo"</form>";
} else{
  echo"<form method=POST action=post.php>";
  echo"訊息:<input type=text name=message size=40>";
  echo"<input type=submit value=張貼>";
  echo"</form>";
  echo"<button><a href=logout.php>登出</a></button>";
  }
if ($result->num_rows > 0) { //檢查紀錄的數目看看是不是有資料
  // output data of each row
  echo "<table width=800 bgcolor=#FFEEDB>";
  //下面這行是表格的標題列
  if ($user_type==NULL){
  echo "<tr bgcolor=#FEFFA5><td>訊息內容</td><td>張貼日期</td></tr>";
  }else{
    echo "<tr bgcolor=#FEFFA5><td>訊息內容</td><td>張貼日期</td><td>標題管理</td></tr>";
  }
    while($row = $result->fetch_assoc()) {
    $id=$row["id"];
    echo "<tr bgcolor=#F9F5FF>";
    echo "<td>" . $row["message"]. "</td>" . 
         "<td>" . $row["postdate"]. "</td>";
    //如果是已登入使用者，要加上貼文管理(連結)的欄位
         if($user_type!=NULL){
      echo"<td>";
      echo"<a href='edit.php?id=$id'>編輯</a>";
      echo"-";
      echo"<a href='delete.php?id=$id'>刪除</a>";
      echo"</td>";
    }
    echo "</tr>";
  }
  echo "</table>";
    } else {
  echo "0 results";
}
$conn->close();
?>
    <hr>
<script> console.log(Date());</script>
    <?php include "../include/footer.php" ; ?>
</body>
</html>