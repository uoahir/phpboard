<?php

namespace Uoahir\Phpboard\application;

class DB
{
    private static $instance = null;
    private $conn;
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "phpboard";

    // DB 연결을 위한 생성자
    private function __construct()
    {
        $this->conn = new \mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // DB 연결 객체를 반환하는 메서드
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new DB();
        }
        return self::$instance;
    }

    // 연결 종료 메서드
    public function close()
    {
        $this->conn->close();
    }

    // 연결된 DB 객체를 반환하는 메서드
    public function getConnection()
    {
        return $this->conn;
    }

    // autocommit 비활성화 메서드
    public function setAutocommit($mode)
    {
        $this->conn->autocommit($mode); // true: 활성화, false: 비활성화
    }

    // autocommit 상태 확인 메서드
    public function getAutocommit()
    {
        return $this->conn->get_autocommit(); // 1(활성화) 또는 0(비활성화)
    }
}

?>