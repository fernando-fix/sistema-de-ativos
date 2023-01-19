<?php

namespace src\dao;

require_once 'src/models/User.php';

use src\models\UserDao;
use src\models\User;
use PDO;

class UserDaoMysql implements UserDao
{

    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function findAll()
    {
        $data = [];

        $sql = $this->pdo->query(
            "SELECT
            users.*,
            grouplvls.name as 'grouplvl'
            FROM
            users
            JOIN
            grouplvls
            ON grouplvl = grouplvls.id"
        );

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        return $data;
    }

    public function findByToken($token)
    {
        if (isset($token)) {

            $sql = $this->pdo->prepare("SELECT * FROM users WHERE token = :token");
            $sql->bindValue(':token', $token);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $newUser = new User;
                $newUser->setId($data['id']);
                $newUser->setName($data['name']);
                $newUser->setGrouplvl($data['grouplvl']);
                $newUser->setEmail($data['email']);
                $newUser->setToken($data['token']);

                return $newUser;
            }
            return false;
        }
    }

    public function findByEmail($email)
    {
        if (!empty($email)) {

            $sql = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
            $sql->bindValue(':email', $email);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $newUser = new User;
                $newUser->setId($data['id']);
                $newUser->setName($data['name']);
                $newUser->setEmail($data['email']);
                $newUser->setPassword($data['password']);
                $newUser->setToken($data['token']);

                return $newUser;
            }
            return false;
        }
    }

    public function updateToken($email, $token)
    {
        if (!empty($token)) {
            $sql = $this->pdo->prepare("UPDATE users SET token = :token WHERE email = :email");
            $sql->bindValue(':email', $email);
            $sql->bindValue(':token', $token);
            $sql->execute();

            return true;
        }
        return false;
    }

    public function addUser(User $user)
    {
        $sql = $this->pdo->prepare("INSERT INTO users
                (name, email, grouplvl, password, token, avatar) VALUES (
                :name, :email, :grouplvl, :password, :token, :avatar)");
        $sql->bindValue(':name', $user->getName());
        $sql->bindValue(':email', $user->getEmail());
        $sql->bindValue(':grouplvl', $user->getGrouplvl());
        $sql->bindValue(':password', $user->getPassword());
        $sql->bindValue(':token', $user->getToken());
        $sql->bindValue(':avatar', $user->getAvatar());
        $sql->execute();
    }
}
