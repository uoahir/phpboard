<?php
    if(!session_id()){
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 글쓰기</title>
    <link rel="stylesheet" href="/css/write.css">
</head>
<body>
<header>
    <div id="header">
        <h1>수영 좋아하는 물개들을 위한 게시판 🦭</h1>
        <nav>
            <button onclick="location.href='/'">목록</button>
            <button onclick="location.href='/auth/logout'">로그아웃</button>
        </nav>
    </div>
</header>
<?php
// 에러 메시지가 세션에 저장되어 있으면 alert 창으로 출력
if (isset($_SESSION['error'])) {
    echo "<script>alert('" . $_SESSION['error'] . "');</script>";
    unset($_SESSION['error']);
}
?>

<div id="write-form-container">
    <form action="/board/create" method="POST">
        <div class="form-group">
            <input type="text" id="title" name="title" placeholder="제목을 입력하세요">
        </div>

        <div class="form-group">
            <textarea id="content" name="content" placeholder="내용을 입력하세요" rows="10"></textarea>
        </div>

        <div class="form-group">
            <button type="submit">게시하기</button>
        </div>
    </form>
</div>

</body>
</html>