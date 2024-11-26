<?php

namespace service;

use Dao\BoardDao;
use DB;

class BoardService {
    private static $instance = null;
    private $conn;

    private function __construct() {
        $this->conn = DB::getInstance()->getConnection();
    }

    public static function getInstance() {
        if(self::$instance == null) {
            self::$instance = new BoardService();
        }
        return self::$instance;
    }

    public function list() :array {
        return BoardDao::getInstance()->list($this->conn);
    }
}