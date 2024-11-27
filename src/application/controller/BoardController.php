<?php

namespace Uoahir\Phpboard\application\controller;

use Uoahir\Phpboard\application\model\Board;
use Uoahir\Phpboard\application\service\BoardService;

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
        include '/Users/uoahir/Desktop/study/phpboard/views/home.php';
    }

    public function view() {
        $id = $_GET['id'];
        $board = BoardService::getInstance()->view($id);
        include '/Users/uoahir/Desktop/study/phpboard/views/board/view.php';
    }

    public function write() {
        include '/Users/uoahir/Desktop/study/phpboard/views/board/write.php';
    }

    public function delete() {
        $id = $_POST['id'];

        // id 값 출력
        echo "ID: " . $id;

        BoardService::getInstance()->delete($id);

        header('Location: /');
        exit();
    }
}
?>