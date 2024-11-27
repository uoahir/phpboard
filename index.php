<?php
    require_once __DIR__ . '/vendor/autoload.php';

    use Uoahir\Phpboard\application\controller\BoardController;
    use Uoahir\Phpboard\application\controller\UserController;

    $requestUri = $_SERVER['REQUEST_URI'];

    // URI에서 경로만 추출
    $path = parse_url($requestUri, PHP_URL_PATH);

//    echo $requestUri;

    switch ($path) {
        case '/' :
            // 게시글 list
            $controller = BoardController::getInstance();
            $controller->list();
            break;

        case '/board/view' :
            $controller = BoardController::getInstance();
            $controller->view();
            break;

        case '/board/write' :
            $controller = BoardController::getInstance();
            $controller->write();
            break;

        case '/board/create' :
            $controller = BoardController::getInstance();
            $controller->create();
            break;

        case '/board/edit' :
            $controller = BoardController::getInstance();
            $controller->edit();
            break;

        case '/board/update' :
            $controller = BoardController::getInstance();
            $controller->update();
            break;

        case '/board/delete' :
            $controller = BoardController::getInstance();
            $controller->delete();
            break;

        case '/auth/login' :
            $controller = UserController::getInstance();
            $controller->login();
            break;

        case '/auth/logout' :
            $controller = UserController::getInstance();
            $controller->logout();
            break;

        default :
            echo "페이지를 찾을 수 없습니다. 관리자에게 문의하세요."; // error 페이지 만들기
            break;
    }

?>