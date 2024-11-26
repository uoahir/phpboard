<?php

class Board
{
    private $boardId;
    private $title;
    private $content;
    private $writerId;
    private $createdAt;

    public function __construct($boardId, $title, $content, $writerId, $createdAt)
    {
        $this->boardId = $boardId;
        $this->title = $title;
        $this->content = $content;
        $this->writerId = $writerId;
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

    public function getWriterId()
    {
        return $this->writerId;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

}
