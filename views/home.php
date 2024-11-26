
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
<header>
    <div id="header">
        <div id="header-title">
            <h1>수영 좋아하는 물개들을 위한 게시판 🦭</h1>
        </div>
        <div id="header-login">
            <div>
                <div>
                    <button>로그인</button>
                </div>
                <div>
                    <button>회원가입</button>
                </div>
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
        <?php if(isset($boards)) ?>
            <?php foreach ($boards as $board): ?>
                <tr>
                    <td><?php echo $board['id']; ?></td>
                    <td><a href="boardview.php?id=<?php echo $board['id']; ?>"><?php echo $board['title']; ?></a></td>
                    <td><?php echo $board['writer']; ?></td>
                    <td><?php echo $board['createdAt']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>