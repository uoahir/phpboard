<?php

namespace Uoahir\Phpboard\application\model;
class User
{
    private $userId;
    private $email;
    private $password;
    private $name;
    private $createdAt;

//  생성자
    public function __construct($userId, $email, $password, $name, $createdAt)
    {
        $this->userId = $userId;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->createdAt = $createdAt; // default 가입일(sysdate)
    }

//  getter 구현
    public function getUserId()
    {
        return $this->userId;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

}