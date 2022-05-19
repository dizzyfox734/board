<div class="round shadow mb-2">
    <div class="p-1 pl-2 border-bottom">
        <div class="d-flex mb-1">
            <div class="purpleUserIcon-img"></div>
            <h3 class="m-0">방명록</h3>
        </div>
        <h2 class="m-0 mb-1"><?= $content->title ?></h2>
        <div class="d-flex justify-content-between">
            <div>
                <span><?= $content->author ?></span>
                <span class="text-gray p-1"><?= $content->created_dt ?></span>
                <span class="text-gray">조회 <?= $content->view_cnt ?></span>
            </div>
            <div>
                <a class="no-deco btn-grey" href="/content/authenticate/delete/<?=$content->id?>">삭제</a>
                <a class="no-deco btn-grey" href="/content/authenticate/edit/<?=$content->id?>">수정</a>
            </div>
        </div>
    </div>
    <div class="p-2 border-bottom">
        <div><?= $content->content ?></div>
    </div>
    <div class="p-1 border-bottom">
        <div class="d-flex mb-1 pl-1">
            <div class="commentIcon-img"></div>
            <h3 class="m-0">댓글</h3>
        </div>
        <?php foreach($commentList as $comment) { ?>
        <div class="round p-05 px-1 mb-03" id="commentBox">
            <div class="d-flex justify-content-between pb-05">
                <div>
                    <span class="pr-1"><?= $comment->author ?></span>
                    <span class="text-gray"><?= $comment->created_dt ?></span>
                </div>
                <div>
                    <button type="button" class="btn-grey" onClick="deleteComment(<?= $comment->id ?>)">삭제</button>
                </div>
            </div>
            <?php if($comment->image_file) { ?>
            <div><image class="comment-img" src="/image/show/<?= $comment->image_file ?>"></img></div> <?php } ?>
            <div>
                <?= $comment->content ?>
            </div>
        </div> <?php } ?>
    </div>
    <div class="p-1 bg-grey">
        <form id="comment-form">
            <div class="d-flex align-items-center mb-1">
                <span>작성자</span>
                <input type="text" name="author" class="txt-round mx-1"/>
                <span>비밀번호</span>
                <input type="text" name="password" class="txt-round mx-1" />
            </div>
            <div class="txt-round mb-1 bg-white">
                <textarea name="content" class="comment-txt w-100 mb-1" rows="3" placeholder="댓글을 남겨보세요"></textarea>

                <div class="d-flex justify-content-between">
                <label class="custom-file" for="image_input">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M4.828 21l-.02.02-.021-.02H2.992A.993.993 0 0 1 2 20.007V3.993A1 1 0 0 1 2.992 3h18.016c.548 0 .992.445.992.993v16.014a1 1 0 0 1-.992.993H4.828zM20 15V5H4v14L14 9l6 6zm0 2.828l-6-6L6.828 19H20v-1.172zM8 11a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" fill="rgba(161,102,213,1)"/></svg>
                    <input type="file" class="hidden" id="image_input" name="image_file" accept="image/*">
                </label>
                <button type="button" class="no-border bg-white" onClick="saveComment(<?= $content->id ?>)">등록</button>
                </div>
            </div>

        </form>
    </div>
</div>
<div class="d-flex justify-content-between mb-2">
    <div class="d-flex">
        <a class="no-deco btn btn-purple" href="/content/edit">글쓰기</a>
        <a class="no-deco btn btn-purple" href="/content/page/<?= ($content->id)-1 ?>">이전글</a>
        <a class="no-deco btn btn-purple" href="/content/page/<?= ($content->id)+1 ?>">다음글</a>
    </div>
    <div class="d-flex">
        <a class="no-deco btn btn-white" href="/home/main">목록</a>
        <button type="button" class="btn btn-white" onClick="javascript:window.scrollTo(0, 0)">TOP</button>
    </div>
</div>

<!-- 댓글삭제 눌렀을 때 -->
<div id="password-error" class="hidden alert">
    <div class="round warning text-center m-auto"> 
        <h4 class="mb-1">댓글을 삭제하시겠습니까?</h4>
        <span class="d-block m-0">삭제 시 복구가 불가능합니다</span>
        <span class="d-block m-0 mb-2">댓글 작성 시 설정한 비밀번호를 입력해주세요</span>
        <form id="commentPass-form" class="d-flex justify-content-center align-items-center mb-2">
            <span class="mr-03">비밀번호</span>
            <input class="txt-round w-50" type="text" name="password" autocomplete="off" placeholder="비밀번호를 입력해주세요">
        </form>
        <div class="d-flex justify-content-center mb-2">
            <button type="button" class="btn btn-white" onClick="javascript:window.location.reload()">취소</button>
            <button id="delete-check" class="btn btn-purple" onClick="">확인</button>
        </div>
    </div>
</div>

<script src="/assets/js/comment.js"></script>
