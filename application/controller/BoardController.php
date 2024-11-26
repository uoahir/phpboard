<?php

namespace controller;

use service\BoardService;

class BoardController {

    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if(self::$instance == null) {
            self::$instance = new BoardController();
        }
        return self::$instance;
    }

    public function list() {
        $boards = BoardService::getInstance()->list();
        require_once __DIR__ . '/../../views/home.php';
    }
}
?>