<?php

namespace Uoahir\Phpboard\application\controller;

use Uoahir\Phpboard\application\model\Board;
use Uoahir\Phpboard\application\service\BoardService;

class BoardController {

    private static $instance = null;

    private function __construct() {
        session_start();
    }

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

        // 뷰로 전달
        extract(['board' => $board]); // view.php에서 board undefined로 떠서 추가함.

        include '/Users/uoahir/Desktop/study/phpboard/views/board/view.php';
    }

    public function write() {
        include '/Users/uoahir/Desktop/study/phpboard/views/board/write.php';
    }

    public function create() {
        if(!isset($_SESSION['userId'])) {
            header('Location: /');
            exit;
        }

        $title = $_POST['title'];
        $content = $_POST['content'];
        $writerId = $_SESSION['userId'];

        // 제목과 내용 필수값 확인
        if (empty($title)) {
            $_SESSION['error'] = "제목은 필수 입력 항목입니다.";
            header('Location: /board/write');
            exit;
        }

        if (empty($content)) {
            $_SESSION['error'] = "내용은 필수 입력 항목입니다.";
            header('Location: /board/write');
            exit;
        }

        // 제목과 내용 길이 제한 체크
        if (strlen($title) > 100) {
            $_SESSION['error'] = "제목은 100자 이내로 작성해야 합니다.";
            header('Location: /board/write');
            exit;
        }

        if (strlen($content) > 1000) {
            $_SESSION['error'] = "내용은 1000자 이내로 작성해야 합니다.";
            header('Location: /board/write');
            exit;
        }

        BoardService::getInstance()->create($title, $content, $writerId);

        header('Location: /');
        exit;
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