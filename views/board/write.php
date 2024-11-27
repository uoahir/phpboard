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

<div id="write-form-container">
    <h2>글쓰기</h2>
    <form action="/board/write" method="POST">
        <div class="form-group">
            <label for="title">제목</label>
            <input type="text" id="title" name="title" placeholder="제목을 입력하세요" required>
        </div>

        <div class="form-group">
            <label for="content">내용</label>
            <textarea id="content" name="content" placeholder="내용을 입력하세요" rows="10" required></textarea>
        </div>

        <div class="form-group">
            <button type="submit">게시하기</button>
        </div>
    </form>
</div>

</body>
</html>