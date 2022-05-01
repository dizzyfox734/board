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
			<?php
            $host = "localhost";
            $user = "phpmyadmin";
            $pw = "asdf1234";
            $db = "GUESTBOOKDB";

            $conn = mysqli_connect($host, $user, $pw, $db) or die("connect failed.");

            $query = "SELECT * FROM `BOARD_TB` WHERE `DEL_FL` = 'N' ORDER BY NO DESC";
            $result = mysqli_query($conn, $query);

			if( ($total = mysqli_num_rows($result))>0 ) {
			} else {
				echo "NO RECORDS FOUND!";
			}
            ?>
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
					<tbody>
					<?php
					while ($rows = mysqli_fetch_assoc($result)) {   ?>
						<tr>
							<?php
							$no = $rows['NO'];
							$link = "location.href='../context.php?no=$no'";
							?>
							<td class="no"><?php echo $no?></td>
							<td class="title" onClick=<?php echo $link?>><?php echo $rows['TITLE'] ?></td>
							<td class="writer"><?php echo $rows['ID']?></td>
							<td class="date"><?php echo $rows['REG_YMD']?></td>
							<td class="views"><?php echo $rows['VIEW_CNT']?></td>
						</tr>   <?php  
					}   ?>
					</tbody>
                </table>
            </div>
            <div>
                <button type="button" onClick="location.href='../write.php'">write</button>
            </div>

        </div>
    </body>
</html>

