<?php

namespace Uoahir\Phpboard\application\controller;

use Uoahir\Phpboard\application\service\UserService;

class UserController {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if(self::$instance == null) {
            self::$instance = new UserController();
        }
        return self::$instance;
    }

    public function login() {
        if($_SERVER['REQUEST_METHOD']=== 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            try {
                $user = UserService::getInstance()->login($email,$password);

                session_start();
                $_SESSION['userId'] = $user -> getUserId(); // 사용자 ID
                $_SESSION['userEmail'] = $user -> getEmail(); // 이메일
                $_SESSION['userName'] = $user -> getName(); // 사용자 이름
                $_SESSION['loggedIn'] = true;  // 로그인 여부 플래그 설정

                // 홈 페이지로 리다이렉트
                header('Location: /');
                exit;
            } catch (\Exception $e) {
                echo "로그인 실패" . $e->getMessage();
            }
        }
    }

    public function logout() {
        // 로그아웃 처리
        session_start();
        session_unset();  // 세션 데이터 삭제
        session_destroy();  // 세션 종료

        header("Location: /");  // 로그아웃 후 리다이렉트
        exit();
    }

    public function register() {
        include __DIR__ .'/../../../views/user/register.php';
    }

    public function checkEmail() {
        $data = json_decode(file_get_contents('php://input'), true);
        $email = $data['email'] ?? '';

        // 유효성 검사
        if (!$email) {
            http_response_code(400);
            echo json_encode(['error' => '아이디가 입력되지 않았습니다.']);
            exit;
        }

        $user = UserService::getInstance()->getUserByEmail($email);

        if($user) {
            echo json_encode(['exists' => true]);
        } else {
            echo json_encode(['exists' => false]);
        }
    }

    public function signup() {
        $requestData = json_decode(file_get_contents('php://input'), true);

// 받은 데이터 확인
        $email = $requestData['email'];
        $password = $requestData['password'];
        $name = $requestData['name'];

        if (!$name || !$email || !$password) {
            echo json_encode(['error' => '필수값이 입력되지 않았습니다.']);
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(['error' => '유효하지 않은 이메일 형식입니다.']);
            exit;
        }

        // 비밀번호 암호화 DEFAULT = bcrypt
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $isRegistered = UserService::getInstance()->register($email, $hashedPassword, $name);

        if($isRegistered) {
            echo json_encode(['success' => true, 'message' => '회원가입이 완료되었습니다.']);
        } else {
            echo json_encode(['success' => false, 'message' => '필수 입력값이 부족합니다.']);
        }



    }
}