<?php
    $target=$_POST["target"];
        if($target!==NULL){
         header("Location: $target");
         exit;
        }
    $menudata= array (
    array("name"=>"回首頁", "link"=>"/mysite/nkust-0903/index.php"),
    array("name"=>"生日詢問表單", "link"=>"/mysite/nkust-0903/test01"),
    array("name"=>"心情留言板", "link"=>"/mysite/nkust-0903/test02"),
    array("name"=>"我的播放清單", "link"=>"/mysite/nkust-0903/test03"),
    array("name"=>"南台科技大學","link"=>"https://www.stust.edu.tw/")
    );
 echo"<form method= POST action=index.php>";
 echo"選單:<select name=target>";
     foreach($menudata as $item) {
     echo "<option value=".
        $item["link"]   . ">" .
        $item["name"]   . "</option>";
    }
     echo"</select>";
     echo"<input type=submit value=前往>";
     echo"</form>";
?>


