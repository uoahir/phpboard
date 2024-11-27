<?php

namespace Uoahir\Phpboard\application\service;

use Uoahir\Phpboard\application\Dao\BoardDao;
use Uoahir\Phpboard\application\DB;
use Uoahir\Phpboard\application\model\Board;

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

    public function getBoardById($id) {
        return BoardDao::getInstance()->getBoardById($id);
    }

    public function create($title, $content, $writerId) {
        return BoardDao::getInstance()->create($title, $content, $writerId);
    }

    public function update($id, $title, $content) {
        return BoardDao::getInstance()->update($id, $title, $content);
    }
    public function delete($id) {
        BoardDao::getInstance()->delete($id);
    }
}