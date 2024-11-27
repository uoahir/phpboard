<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 글 수정</title>
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

<?php if(isset($board)) :?>
<div id="write-form-container">
    <h2>글 수정</h2>
    <form action="/board/update" method="POST">
        <!-- 게시글 ID를 hidden 필드로 전달 -->
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($board->getBoardId()); ?>">

        <div class="form-group">
            <label for="title">제목</label>
            <!-- 기존 제목을 value로 넣음 -->
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($board->getTitle()); ?>" placeholder="제목을 입력하세요">
        </div>

        <div class="form-group">
            <label for="content">내용</label>
            <!-- 기존 내용을 value로 넣음 -->
            <textarea id="content" name="content" placeholder="내용을 입력하세요" rows="10"><?php echo htmlspecialchars($board->getContent()); ?></textarea>
        </div>

        <div class="form-group">
            <button type="submit">수정하기</button>
        </div>
    </form>
</div>
<?php endif; ?>

</body>
</html>