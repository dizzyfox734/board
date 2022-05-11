<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css" />
        <link rel="stylesheet" type="text/css" href="/assets/css/table.css" />
        <link rel="stylesheet" type="text/css" href="/assets/css/top.css" />
        <title>Board</title>
    </head>
    <body>
        <!-- header -->
        <div class="d-flex banner">
            <div class="banner-img"></div>
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
				echo "등록된 글이 없습니다.";
			}
            ?>
            <div class="table-container">
				<div class="mb-1 d-flex width-full justify-content-end">
					<a class="no-deco btn btn-purple m-0" href="/content/edit">글쓰기</a>
				</div>
            	<table class="board b-cell">
                    <thead class="b-thead">
                        <tr>
                            <td class="th-grey">번호</td>
                            <td class="th-grey">제목</td>
                            <td class="th-grey">작성자</td>
                            <td class="th-grey">작성일</td>
                            <td class="th-grey">조회수</td>
                        </tr>
                    </thead>
					<tbody>
					<?php
					while ($rows = mysqli_fetch_assoc($result)) {   ?>
						<tr>
							<?php
							$no = $rows['NO'];
							$link = "location.href='../page.php?no=$no'";
							?>
							<td><?php echo $no?></td>
							<td class="title" onClick=<?php echo $link?>><?php echo $rows['TITLE'] ?></td>
							<td><?php echo $rows['ID']?></td>
							<td><?php echo $rows['REG_YMD']?></td>
							<td><?php echo $rows['VIEW_CNT']?></td>
						</tr>   <?php  
					}   ?>
					</tbody>
                </table>
            </div>
        </div>
    </body>
</html>

