<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <title>Board</title>
    </head>
    <body>
        <header>
            <img src="img/2-1.png"
                srcset="img/2-1@2x.png 2x, img/2-1@3x.png 3x"
                class="banner">
        </header>

        <div class="body"> <!-- 좌우위치조절 -->
            <!-- (아이콘) 방명록 -->
            <div>
                <img src="img/userIcon.png"
                    srcset="img/userIcon@2x.png 2x, img/userIcon@3x.png 3x"
                    class="userIcon">
                <span class="pageName">방명록</span>
            </div>
            
            <!-- 게시판 table -->
        </div>




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
                    <?php
                    $no = $rows['BOARD_NO'];
                    $link = "location.href='../context.php?no=$no'";
                    ?>
                    <td class="no"><?php echo $no?></td>
                    <td class="title" onClick=<?php echo $link?>><?php echo $rows['TITLE'] ?></td>
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