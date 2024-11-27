<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>
<!--    <link rel="stylesheet" href="/css/home.css">-->
</head>
<body>
<header>
    <div id="header">
        <div id="header-title">
            <h1>수영 좋아하는 물개들을 위한 게시판 🦭</h1>
        </div>
        <div id="header-login">
            <div id="login">
                <?php
                session_start();
                // 로그인 상태 확인
                if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true): ?>
                    <!-- 로그인 상태일 때: 로그아웃 버튼 -->
                    <form action="/auth/logout" method="POST">
                        <button type="submit">로그아웃</button>
                    </form>
                <?php else: ?>
                    <!-- 로그인 안 된 상태일 때: 로그인 폼 -->
                    <form action="/auth/login" method="POST">
                        <input type="text" name="email" placeholder="이메일" required>
                        <input type="password" name="password" placeholder="비밀번호" required>
                        <button type="submit">로그인</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

</header>

<!-- 게시글 리스트 -->
<div class="board-list">
    <table>
        <thead>
        <tr>
            <th>번호</th>
            <th>제목</th>
            <th>작성자</th>
            <th>작성일</th>
        </tr>
        </thead>
        <tbody>
        <?php if(isset($boards)): ?>
            <?php foreach ($boards as $index => $board): ?>
                <tr onclick="location.href='/board/view?id=<?php echo $board->getBoardId(); ?>'">
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo $board->getTitle(); ?></a></td>
                    <td><?php echo $board->getWriter(); ?></td>
                    <td>
                        <?php
                        // DateTime 객체를 생성하여 날짜만 포맷
                        $createdAt = new DateTime($board->getCreatedAt()); // 객체의 createdAt을 DateTime으로 변환
                        echo $createdAt->format('Y-m-d'); // YYYY-MM-DD 형식으로 출력
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>
<?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true): ?>
    <div>
        <button onclick="location.href='/board/write'">글쓰기</button>
    </div>
<?php endif; ?>
<script src="/js/home.js"></script>
</body>