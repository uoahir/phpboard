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
    <title>게시글 상세보기</title>
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
<div class="container">
    <h3>게시글 상세보기</h3>
    <?php if (isset($board)) :?>
    <div class="board-detail">
        <h2><?php echo htmlspecialchars($board->getTitle()); ?></h2>
        <p><strong>작성자:</strong> <?php echo htmlspecialchars($board->getWriter()); ?></p>
        <p><strong>작성일:</strong> <?php echo htmlspecialchars($board->getCreatedAt()); ?></p>
        <div class="content">
            <p><?php echo nl2br(htmlspecialchars($board->getContent())); ?></p>
        </div>

        <!-- 로그인한 사용자와 작성자가 동일한 경우에만 삭제 버튼 표시 -->
        <?php if (isset($_SESSION['userId']) && $_SESSION['userId'] == $board->getWriterId()): ?>
            <form action="/board/delete" method="POST">
                <input type="hidden" name="id" value="<?php echo $board->getBoardId(); ?>">
                <button type="submit" onclick="return confirm('정말 삭제하시겠습니까?');">삭제</button>
            </form>
            <button onclick="location.href='/board/edit?id=<?php echo $board->getBoardId(); ?>'">글 수정</button>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</div>
</body>
</html>