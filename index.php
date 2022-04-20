<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <title>Board</title>
    </head>
    <body>
        <?php
        $host = "localhost";
        $user = "root";
        $pw = "1234";
        $db = "BOARDDB";

        $conn = mysqli_connect($host, $user, $pw, $db) or die("connect failed.");

        $query = "select BOARD_NO, TITLE, DEL_FL, REG_YMD from board_tb WHERE DEL_FL='N' order by BOARD_NO desc;";
        $result = mysqli_query($conn, $query);
        $total = mysqli_num_rows($result);
        ?>
        <table class="board">
            <thead>
                <tr>
                    <td>번호</td>
                    <td>제목</td>
                    <td>작성일</td>
                </tr>
            </thead>
            <tbody>
            <?php
            while ($rows = mysqli_fetch_assoc($result)) {   ?>
                <tr>
                    <td class="no"><?php echo $rows['BOARD_NO']?></td>
                    <td class="title" onClick="location.href='../context.php'"><?php echo $rows['TITLE']?></td>
                    <td class="date"><?php echo $rows['REG_YMD']?></td>
                </tr>   <?php  
            }   ?>
            </tbody>
        </table>
        
        <div>
            <button type="button" onClick="location.href='../write.php'">write</button>
        </div>

    </body>
</html>