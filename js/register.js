document.addEventListener('DOMContentLoaded', () => {
    const emailInput = document.getElementById('email');
    const checkDuplicateButton = document.getElementById('checkDuplicate');
    const emailMessage = document.getElementById('emailMessage');

    const passwordInput = document.getElementById('password');
    const passwordConfirmInput = document.getElementById('passwordConfirm');
    const passwordMatchMessage = document.getElementById('passwordMatchMessage');

    const nameInput = document.getElementById('name');

    const registerForm = document.getElementById("registerForm");


    // 아이디 중복 확인 로직
    checkDuplicateButton.addEventListener('click', () => {
        const email = emailInput.value.trim();

        if (!email) {
            emailMessage.textContent = '아이디를 입력하세요.';
            emailMessage.style.color = 'red';
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
                    emailMessage.textContent = '이미 사용 중인 아이디입니다.';
                    emailMessage.style.color = 'red';
                } else {
                    emailMessage.textContent = '사용 가능한 아이디입니다.';
                    emailMessage.style.color = 'green';
                }
            })
            .catch((error) => {
                console.error('Error:', error);
                emailMessage.textContent = '오류가 발생했습니다.';
                emailMessage.style.color = 'red';
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

    registerForm.addEventListener("submit", (e) => {
        e.preventDefault();

        const name = nameInput.value.trim();
        const email = emailInput.value.trim();
        const password = passwordInput.value;
        const confirmPassword = passwordConfirmInput.value;

        if (!email || !password || !confirmPassword || !name) {
            alert("모든 필드를 입력해주세요.");
            return;
        }

        if (password !== confirmPassword) {
            alert("비밀번호가 일치하지 않습니다.");
            return;
        }

        // 서버로 회원가입 요청
        fetch("/auth/signup", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ email, password, name})
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("회원가입이 완료되었습니다.");
                    window.location.href = "/";
                } else {
                    alert("회원가입에 실패했습니다: " + data.message);
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("회원가입 요청 중 오류가 발생했습니다.");
            });
    });
});



