<?php

namespace Uoahir\Phpboard\application\model;
class Board
{
    private $boardId;
    private $title;
    private $content;
    private $writer;
    private $writerId;
    private $createdAt;

    public function __construct($boardId, $title, $content, $writer, $writerId, $createdAt)
    {
        $this->boardId = $boardId;
        $this->title = $title;
        $this->content = $content;
        $this->writer= $writer;
        $this->writerId= $writerId;
        $this->createdAt = $createdAt;
    }

    public function getBoardId()
    {
        return $this->boardId;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getWriter()
    {
        return $this->writer;
    }

    /**
     * @return mixed
     */
    public function getWriterId()
    {
        return $this->writerId;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

}
