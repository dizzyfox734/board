<div class="round shadow mb-2">
    <div class="p-1 border-bottom">
        <div class="d-flex mb-1">
            <div class="purpleUserIcon-img"></div>
            <h3 class="m-0">방명록</h3>
        </div>
        <h2 class="m-0 mb-1">제목</h2>
        <div class="d-flex justify-content-between">
            <div>
                <span>작성자</span>
                <span>작성일</span>
            </div>
            <div>
                <a class="no-deco btn btn-white" herf="">삭제</a>
                <a class="no-deco btn btn-white" herf="">수정</a>
            </div>
        </div>
    </div>
    <div class="p-1 border-bottom">
        <div>글내용</div>
    </div>
    <div class="p-1 border-bottom">
        <div class="d-flex mb-1">
            <div class="commment-img"></div>
            <h3 class="m-0">댓글</h3>
        </div>
        <div class="round p-1" id="commentBox">
            <div class="d-flex justify-content-between">
                <div>
                    <span class="pr-1">작성자</span>
                    <span>작성일</span>
                </div>
                <div>
                    <button type="button" class="btn btn-white" onClick="">삭제</button>
                </div>
            </div>
            <div>
                이미지
            </div>
            <div>
                댓글내용
            </div>
        </div>
    </div>
    <div class="p-1 bg-grey">
        <form>
            <div class="d-flex align-items-center mb-1">
                <span>작성자</span>
                <input type="text" class="txt-round mx-1"/>
                <span>비밀번호</span>
                <input type="text" class="txt-round mx-1" />
            </div>
            <textarea class="text-round w-100" placeholder="댓글을 남겨보세요"></textarea>
            <div class="d-flex justify-content-between">
                <button type="button">이미지</button>
                <button type="button" class="btn btn-white" onClick="">등록</button>
            </div>
        </form>
    </div>
</div>
<div class="d-flex justify-content-between">
    <div class="d-flex">
        <a class="no-deco btn btn-purple" href="">글쓰기</a>
        <button type="button" class="btn btn-white" onClick="">이전글</button>
        <button type="button" class="btn btn-white" onClick="">다음글</button>
    </div>
    <div class="d-flex">
        <a class="no-deco btn btn-white" herf="/home/main">목록</a>
        <button type="button" class="btn btn-white" onClick="">TOP</button>
    </div>
</div>
<!-- 댓글삭제 눌렀을 때 -->
<div class="round warning text-center"> <!-- hidden  --> 
    <h3 class="mb-1">댓글을 삭제하시겠습니까?</h3>
    <h4 class="m-0 mb-2">삭제 시 복구가 불가능합니다</h4>
    <h4 class="m-0 mb-2">글 작성 시 설정한 비밀번호를 입력해주세요</h4>
    <div class="d-flex justify-content-center mb-2">
        <button type="button" class="btn btn-white" onClick="">취소</button>
        <button type="button" class="btn btn-purple" onClick="">확인</button>
    </div>
</div>
