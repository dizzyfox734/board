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
                <a class="no-deco btn btn-white" href="/content/authenticate/delete/<?=$content->id?>">삭제</a>
                <a class="no-deco btn btn-white" href="/content/authenticate/edit/<?=$content->id?>">수정</a>
            </div>
        </div>
    </div>
    <div class="p-2 border-bottom">
        <div><?= $content->content ?></div>
    </div>
    <div class="p-1 border-bottom">
        <div class="d-flex mb-1 pl-1">
            <div class="commment-img"></div>
            <h3 class="m-0">댓글</h3>
        </div>
        <?php foreach($commentList as $comment) { ?>
        <div class="round p-1 mb-03" id="commentBox">
            <div class="d-flex justify-content-between">
                <div>
                    <span class="pr-1"><?= $comment->author ?></span>
                    <span class="text-gray"><?= $comment->created_dt ?></span>
                </div>
                <div>
                    <button type="button" class="btn btn-white" onClick="deleteComment(<?= $comment->id ?>)">삭제</button>
                </div>
            </div>
            <!-- < ?php if($comment->image_file) { ?>
            <div><image scr="< ?= $comment->image_file ?>" /></div> < ?php } ?> -->
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
            <textarea name="content" class="text-round w-100" placeholder="댓글을 남겨보세요"></textarea>
            <div class="d-flex justify-content-between">
                <div class="custom-file">
                    <input type="file" class="" name="image_file" accept="image/*">
                </div>
                <button type="button">이미지</button>
                <button type="button" class="btn btn-white" onClick="saveComment(<?= $content->id ?>)">등록</button>
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
