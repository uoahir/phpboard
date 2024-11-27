<?php

namespace Uoahir\Phpboard\application\Dao;


use Uoahir\Phpboard\application\DB;
use Uoahir\Phpboard\application\model\Board;

class BoardDao {
    private static $instance = null;
    private $conn;

    private function __construct() {
        $this->conn = DB::getInstance()->getConnection();
    }

    public static function getInstance() {
        if(self::$instance == null) {
            self::$instance = new BoardDao();
        }
        return self::$instance;
    }

    public function list() {
        $sql = "SELECT B.id, B.title, B.content, U.name, B.createdAt 
                FROM BOARDS B 
                INNER JOIN USERS U ON B.writerId = U.id";

        $result = $this -> conn ->query($sql);

        $boards = [];
        if($result ->num_rows>0) {
            while($row = $result->fetch_assoc()) {
                $boards[] = new Board(
                    $row['id'],
                    $row['title'],
                    $row['content'],
                    $row['name'],
                    null,
                    $row['createdAt']
                );
            }
        }
        // 배열 출력 (디버깅용)
//        echo "<pre>";
//        print_r($boards);
//        echo "</pre>";
        $this->conn -> close();
        return $boards;
    }

    public function view($id) {
        $sql = "SELECT B.id, B.title, B.content, U.name, B.writerId, B.createdAt 
                FROM BOARDS B 
                INNER JOIN USERS U ON B.writerId = U.id
                WHERE B.id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows===0){
            return null;
        }

        $boardData = $result->fetch_assoc();

        $boardDTO = new Board(
            $boardData['id'],
            $boardData['title'],
            $boardData['content'],
            $boardData['name'],
            $boardData['writerId'],
            $boardData['createdAt']
        );

        $this->conn->close();

        return $boardDTO;
    }

    public function write() {

    }

    public function update() {

    }

    public function delete($id) {
        $sql = "DELETE FROM BOARDS WHERE ID = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $this->conn->commit();
        $this->conn->close();
    }

}