<?php

namespace Dao;


class BoardDao {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if(self::$instance == null) {
            self::$instance = new BoardDao();
        }
        return self::$instance;
    }

    public function list($conn) {
        $sql = "SELECT B.id, B.title, B.content, U.name, B.createdAt FROM BOARDS B INNER JOIN USERS U ON B.writerId = U.userId";

        $result = $conn->query($sql);

        $boards = [];
        if($result ->num_rows>0) {
            while($row = $result->fetch_assoc()) {
                $boards[] = $row;
            }
        }
        echo $boards;
        return $boards;
    }



}