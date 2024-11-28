<?php

namespace Uoahir\Phpboard\application\Dao;

use Uoahir\Phpboard\application\DB;
use Uoahir\Phpboard\application\model\User;

class UserDao {
    private static $instance = null;
    private $conn;

    private function __construct() {
        $this->conn = DB::getInstance()->getConnection();
    }

    public static function getInstance() {
        if(self::$instance == null) {
            self::$instance = new UserDao();
        }
        return self::$instance;
    }

    public function getUserByEmail($email) {
        $sql = "SELECT id, email, password FROM USERS WHERE email = ?";
        $stmt = $this ->conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result -> num_rows === 0) {
            return null;
        }

        $userData = $result->fetch_assoc();

        $userDTO = new User(
            $userData['id'],
            $userData['email'],
            $userData['password'],
            $userData['name'],
            null
        );

        if (isset($stmt)) {
            $stmt->close();
        }
        $this->conn->close();

        return $userDTO;
    }
}