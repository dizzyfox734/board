<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css" />
        <link rel="stylesheet" type="text/css" href="/assets/css/top.css" />
        <title>Board</title>
    </head>
    <body>
        <!-- header -->
        <div class="d-flex banner">
            <div class="login-img"></div>
        </div>

        <!-- body -->
        <div class="container">
            <div class="d-flex detail">
                <div class="userIcon-img"></div>
                <h2 class="m-0">방명록</h2>
            </div>
            <div class="table-container">
                <table class="board">
                    <thead>
                        <tr>
                            <td>번호</td>
                            <td>제목</td>
                            <td>작성자</td>
                            <td>작성일</td>
                            <td>조회수</td>
                        </tr>
                    </thead>
                </table>
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

        </div>
    </body>
</html>