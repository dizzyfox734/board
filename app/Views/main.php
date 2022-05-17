<div class="detail">
    <div class="d-flex">
        <div class="userIcon-img"></div>
        <h2 class="m-0">방명록</h2>
    </div>
    <div>야몬에게 방명록을 남겨주세요 :)</div>
</div>
<div class="table-container">
    <div class="mb-1 d-flex width-full justify-content-end">
        <a class="no-deco btn btn-purple m-0" href="/content/edit">글쓰기</a>
    </div>
    <table id="content-table" class="board b-cell">
        <thead class="b-thead">
            <tr>
                <td class="th-grey">번호</td>
                <td class="th-grey w-65">제목</td>
                <td class="th-grey">작성자</td>
                <td class="th-grey">작성일</td>
                <td class="th-grey">조회수</td>
            </tr>
        </thead>
        <tbody>
			<?php 
			foreach($list as $content) { 
                if($content->SECRET_FL == 1) {
                    $isSecret = true;
                } else {
                    $isSecret = false;
                };
            ?>
			<tr>
			<td><?=$content->id?></td>
			<td><a class="no-deco text-black d-flex align-items-center w-100 pl-2" href=<?= $isSecret? "/content/authenticate/page/$content->id" : "/content/page/$content->id" ?>>
                <span class=" mr-03"><?=$content->title?></span>
                <?php if($comment_cnt[$content->id]) { ?><span class='text-purple mr-03'>[<?=$comment_cnt[$content->id]?>] </span> <?php } ?>
                <?php if($isSecret) { ?><img class="lock-img"></img><?php } ?>
            </a></td>
			<td><?=$content->author?></td>
			<td><?=$content->created_dt->format('Y-m-d')?></td>
			<td><?=$content->view_cnt?></td>
			</tr>
			<?php } ?>
        </tbody>
    </table>
</div>
