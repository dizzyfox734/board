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
                ?>
                <td><?php echo $no?></td>
                <td class="title"><a class="no-deco text-black" href="/content/page/<?= $no?>"><?php echo $rows['TITLE'] ?></a></td>
                <td><?php echo $rows['ID']?></td>
                <td><?php echo $rows['REG_YMD']?></td>
                <td><?php echo $rows['VIEW_CNT']?></td>
            </tr>   <?php  
        }   ?>
        </tbody>
    </table>
</div>
