<?php

include './db/Database.php';
include '../models/User.php';

class UserHelper
{
    /**
     * Method which creates user
     * @param string $firstName Users first name
     * @param string $lastName Users last name
     * @param string $username Users username
     * @param int $password Users password
     * @return User|null Method returns User if it's created successfully, else returns null
     */
    public static function createUser($firstName, $lastName, $username, $email, $password)
    {
        $hashedPassword = md5($password);
        $stmt = Database::getInstance()->getConnection()->prepare("INSERT INTO `users`(`first_name`, `last_name`, `username`, `email`, `password`) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $firstName, $lastName, $username, $email, $hashedPassword);
        if (!$stmt->execute()) {
            return null;
        }
        return new User($firstName, $lastName, $username, $email, $hashedPassword);
    }

    /**
     * Method which gets user by it's username
     * @param string $username Users username
     * @return User|null Method returns User if it's found, else returns null
     */
    public static function getUserByUsername($username)
    {
        $stmt = Database::getInstance()->getConnection()->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_all(MYSQLI_ASSOC);
        if (empty($result[0])) {
            return null;
        }
        return User::createUserFromDBAssocArray($result[0]);
    }

    /**
     * Method which logs user in
     * @param string $username Users username
     * @param int $password Users password
     * @return User|null Method returns User if it's logged in successfully, else returns null
     */
    public static function login($username, $password)
    {
        $user = UserHelper::getUserByUsername($username);
        if ($user != null) {
            return md5($password) == $user->getPassword() ? $user : null;
        }
        return $user;
    }

}