<?php

namespace Uoahir\Phpboard\application\service;

use Uoahir\Phpboard\application\Dao\BoardDao;
use Uoahir\Phpboard\application\DB;

class BoardService {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if(self::$instance == null) {
            self::$instance = new BoardService();
        }
        return self::$instance;
    }

    public function list() {
        return BoardDao::getInstance()->list();
    }

    public function view($id) {
        return BoardDao::getInstance()->view($id);
    }

    public function write() {

    }

    public function delete($id) {
        BoardDao::getInstance()->delete($id);
    }
}