<?php
class User
{
    private $id;
    private $firstName;
    private $lastName;
    private $username;
    private $email;
    private $password;

    public function __construct($firstName, $lastName, $username, $email, $password)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public static function createUserFromDBAssocArray($arr): User
    {
        $user = new User($arr['first_name'], $arr['last_name'], $arr['username'], $arr['email'], $arr['password']);
        $user->setId($arr['id']);
        return $user;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    private function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

}