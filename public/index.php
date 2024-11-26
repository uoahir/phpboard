<?php
    $requestUri = $_SERVER['REQUEST_URI'];

    echo $requestUri;

    switch ($requestUri) {
        case '/' :
            // 게시글 list
            require_once __DIR__ . '/../application/controller/BoardController.php';
            $controller = \controller\BoardController::getInstance();
            $controller->list();
            break;

        case '/board/view' : break;

        default :
            echo "페이지를 찾을 수 없습니다. 관리자에게 문의하세요.";
            break;
    }

?>