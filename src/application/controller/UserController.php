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
}