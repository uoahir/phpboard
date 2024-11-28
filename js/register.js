document.addEventListener('DOMContentLoaded', () => {
    const usernameInput = document.getElementById('email');
    const checkDuplicateButton = document.getElementById('checkDuplicate');
    const usernameMessage = document.getElementById('emailMessage');
    const passwordInput = document.getElementById('password');
    const passwordConfirmInput = document.getElementById('passwordConfirm');
    const passwordMatchMessage = document.getElementById('passwordMatchMessage');

    // 아이디 중복 확인 로직
    checkDuplicateButton.addEventListener('click', () => {
        const email = usernameInput.value.trim();

        if (!email) {
            usernameMessage.textContent = '아이디를 입력하세요.';
            usernameMessage.style.color = 'red';
            return;
        }

        // AJAX 요청
        fetch('/auth/check/email', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ email }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.exists) {
                    usernameMessage.textContent = '이미 사용 중인 아이디입니다.';
                    usernameMessage.style.color = 'red';
                } else {
                    usernameMessage.textContent = '사용 가능한 아이디입니다.';
                    usernameMessage.style.color = 'green';
                }
            })
            .catch((error) => {
                console.error('Error:', error);
                usernameMessage.textContent = '오류가 발생했습니다.';
                usernameMessage.style.color = 'red';
            });
    });

    // 비밀번호 확인 로직
    passwordConfirmInput.addEventListener('input', () => {
        const password = passwordInput.value;
        const confirmPassword = passwordConfirmInput.value;

        if (password !== confirmPassword) {
            passwordMatchMessage.textContent = '비밀번호가 일치하지 않습니다.';
            passwordMatchMessage.style.color = 'red';
        } else {
            passwordMatchMessage.textContent = '비밀번호가 일치합니다.';
            passwordMatchMessage.style.color = 'green';
        }
    });
});



