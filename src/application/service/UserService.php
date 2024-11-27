<?php

namespace Uoahir\Phpboard\application\service;

use Uoahir\Phpboard\application\Dao\UserDao;
use Uoahir\Phpboard\application\DB;

class UserService {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if(self::$instance == null) {
            self::$instance = new UserService();
        }
        return self::$instance;
    }

    public function login($email, $password) {
        $user = UserDao::getInstance()->getUserByEmail($email);

        if(!$user || password_verify($password, $user->getPassword())) {
            throw new \Exception('잘못된 이메일 또는 비밀번호');
        }
        return $user;
    }
}