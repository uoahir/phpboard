<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
    <script src="/js/register.js" defer></script>

</head>
<body>
<div class="container">
    <h1>회원가입</h1>
    <form action="/auth/signup" method="POST">
        <!-- 이름 입력 -->
        <div class="form-group">
            <label for="name">이름</label>
            <input type="text" id="name" name="name" required placeholder="이름을 입력하세요">
        </div>

        <!-- 이메일 입력 -->
        <div class="form-group">
            <label for="email">이메일</label>
            <input type="email" id="email" name="email" required placeholder="이메일을 입력하세요">
            <button type="button" id="checkDuplicate">중복확인</button>
            <span id="emailMessage"></span>
        </div>

        <!-- 비밀번호 입력 -->
        <div class="form-group">
            <label for="password">비밀번호</label>
            <input type="password" id="password" name="password" required placeholder="비밀번호를 입력하세요">
        </div>

        <!-- 비밀번호 확인 -->
        <div class="form-group">
            <label for="password_confirm">비밀번호 확인</label>
            <input type="password" id="passwordConfirm" name="passwordConfirm" required placeholder="비밀번호를 다시 입력하세요">
            <span id="passwordMatchMessage"></span>
        </div>


        <!-- 회원가입 버튼 -->
        <div class="form-group">
            <button type="submit">회원가입</button>
        </div>
    </form>

    <!-- 로그인 페이지로 이동 -->
    <div class="login-link">
        <p>이미 계정이 있으신가요? <a href="/auth/login.php">로그인하기</a></p>
    </div>
</div>
</body>
</html>
