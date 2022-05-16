<div class="d-flex detail">
    <h2 class="m-0"><?= isSet($content) ? '수정하기' : '글쓰기' ?></h2>
</div>
<div class="table-container">
    <form id="content-form">
        <table class="board board-purple-top">
            <tr>
                <th class="b-head th-grey">제목</th>
                <th colspan="3"><input class="txt-round w-95" type="text" name="title" autocomplete="off" value="<?= isSet($content) ? $content->title : '' ?>"></th>
            </tr>
            <tr>
                <th class="th-grey">내용</th>
                <th colspan="3"><textarea id="summernote-editor" class="txt-round w-95" name="content" rows="15"><?= isSet($content) ? $content->content : '' ?></textarea></th>
            </tr>
            <!-- 새 글 등록 시에만 보임 -->
            <?= isSet($content) ? '' : '<tr>
                <th class="th-grey">작성자</th>
                <th><input class="txt-round w-80" type="text" name="id" autocomplete="off"></th>
                <th class="th-grey">이메일(선택)</th>
                <th><input class="txt-round w-80" type="text" name="email" autocomplete="off"></th>
            </tr>
            <tr>
                <th class="th-grey">비밀번호</th>
                <th><input class="txt-round w-80" type="text" name="password" autocomplete="off" placeholder="영문+숫자 최대 6자"></th>
            </tr>' ?>
            <tr height="32px">
                <th class="th-grey">공개글 설정</th>
                <th>
                    <label for="public" class="d-flex">
                        <!-- 수정 시 공개글일 때 체크 -->
                        <input type="radio" id="public" name="SECRET_FL" value="0" <?php if(isSet($content)) { if($content->SECRET_FL == 0) { echo 'checked'; } } ?> />
                        <h4 class="m-0">공개글 설정</h4>
                    </lable>
                    <label for="secret" class="d-flex">
                        <!-- 수정 시 비밀글일 때 체크 -->
                        <input type="radio" id="secret" name="SECRET_FL" value="1" <?php if(isSet($content)) { if($content->SECRET_FL == 1) { echo 'checked'; } } ?> />
                        <h4 class="m-0">비밀글 설정</h4>
                    </label>
                </th>
            </tr>
        </table>
    </form>
</div>
<div class="d-flex align-items-center justify-content-center">
    <a class="no-deco btn btn-white" href="/home/main">취소</a>
    <button class="btn btn-purple" onClick='edit(<?= isSet($content) ? $content->id : "" ?>)' >완료</button>
</div>

<script src="/assets/js/edit.js"></script>

<!-- include summernote css/js -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
      $('#summernote-editor').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 350,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
</script>