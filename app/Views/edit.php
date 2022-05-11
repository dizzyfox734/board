<div class="d-flex detail">
    <h2 class="m-0">글쓰기</h2>
</div>
<div class="table-container">
    <form>
        <table class="board board-purple-top">
            <tr>
                <th class="b-head th-grey">제목</th>
                <th colspan="3"><input class="txt-round w-95" type="text" name="title" autocomplete="off"></th>
            </tr>
            <tr>
                <th class="th-grey">내용</th>
                <th colspan="3"><textarea class="txt-round w-95" name="content" rows="15"></textarea></th>
            </tr>
            <tr>
                <th class="th-grey">작성자</th>
                <th><input class="txt-round w-80" type="text" name="id" autocomplete="off"></th>
                <th class="th-grey">이메일(선택)</th>
                <th><input class="txt-round w-80" type="text" name="email" autocomplete="off"></th>
            </tr>
            <tr>
                <th class="th-grey">비밀번호</th>
                <th><input class="txt-round w-80" type="text" name="password" autocomplete="off" placeholder="영문+숫자 최대 6자"></th>
            </tr>
            <tr height="32px">
                <th class="th-grey">공개글 설정</th>
                <th>
                    <label for="public" class="d-flex">
                        <input type="radio" id="public" name="setPublic" />
                        <h4 class="m-0">공개글 설정</h4>
                    </lable>
                    <label for="secret" class="d-flex">
                        <input type="radio" id="secret" name="setPublic" />
                        <h4 class="m-0">비밀글 설정</h4>
                    </label>
                </th>
            </tr>
        </table>
    </form>
</div>
<div class="d-flex align-items-center justify-content-center">
    <a class="no-deco btn btn-white" href="/home/main">취소</a>
    <a class="no-deco btn btn-purple" href="">완료</a>
</div>

<script src="/assets/js/edit.js"></script>