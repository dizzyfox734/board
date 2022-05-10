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
            <div class="detail">
                <h2 class="m-0 mb-1">게시글 수정 / 삭제</h2>
                <!-- 삭제 시에만 -->
                <div>게시글 삭제 시 복구가 불가능합니다.</div>
            </div>
            <div class="round shadow mb-2 p-1">
                <div>글 정보</div>
                <div class="table-container">
                    <table class="board">
                        <tr height="32px">
                            <th class="b-head th-grey">제목</th>
                            <th colspan="3" class="px-1 text-start">제목ㅅㄷㄴㅅ</th>
                        </tr>
                        <tr height="32px">
                            <th class="th-grey">내용</th>
                            <th colspan="3" class="px-1 text-start">내용ㅅㄷㄴㅅ</th>
                        </tr>
                    </table>
                </div>
                <div>글 작성시 설정한 비밀번호를 입력해주세요.</div>
                <div class="table-container">
                    <form>
                        <table class="board">
                            <tr height="32px">
                                <th class="th-grey">비밀번호</th>
                                <th colspan="3" class="px-1"><input class="txt-round w-80" type="text" name="password" autocomplete="off" placeholder="비밀번호를 입력해주세요"></th>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <a class="no-deco btn btn-white" herf="/main">취소</a>
                <button type="button" class="btn btn-purple" onClick="">완료</button>
            </div>
        </div>
        <div class="round warning hidden text-center">
            <h3 class="mb-1">비밀번호 확인</h3>
            <h4 class="m-0 mb-2">비밀번호가 일치하지 않습니다</h4>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-purple" onClick="">확인</button>
            </div>
        </div>
    </body>
</html>

<!-- https://remixicon.com/ -->