<?php
    require "include/config.php";
    require "include/utils.php";
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/Style.css">
<meta charset="utf-8">
<style>
    body {
        font-family:微軟正黑體;
    }
</style>
<title>蔡承翰0908</title>
</head>
<body>
<h2>蔡承翰0908 PHP練習記錄</h2>
<hr>
<?php
    get_counter("homepage");
    $conn->close();
?>

<?php include "include/menu.php"; ?>
<hr>
<?php include "include/footer.php"; ?>
</body>
</html>
