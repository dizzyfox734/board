<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <title>
        <?php
        echo $title = $_GET['title'];
        ?>
        </title>
    </head>
    <body>
    <?php
        $host = "localhost";
        $user = "root";
        $pw = "1234";
        $db = "BOARDDB";

        $conn = mysqli_connect($host, $user, $pw, $db) or die("connect failed.");

        $query = "select MAIN_TEXT from maintext_tb;";
    ?>
    </body>
</html>