<?php
namespace App\Model;

use Base\AbstractModel;
use Base\Db;

class User extends AbstractModel
{
    private $id;
    private $name;
    private $password;
    private $email;
    private $createdAt;

    public function __construct($data = [])
    {
        if ($data) {
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->password = $data['password'];
            $this->email = $data['email'];
            $this->createdAt = $data['created_at'];
        }
    }
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail(): int
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt(string $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }
    public function save()
    {
        $db = Db::getInstance();
        $insert = "INSERT INTO users (`name`, `password`, `created_at`, `email`) VALUES (:name, :password, CURDATE(), :email)";
        $db->exec($insert, __METHOD__, [
            ':name' => $this->name,
            ':password' => $this->password,
            ':email' => $this->email
        ]);

        $id = $db->lastInsertId();
        $this->id = $id;

        return $id;
    }

    public static function getById(int $id): ?self
    {
        $db = Db::getInstance();
        $select = "SELECT * FROM users WHERE id = $id";
        $data = $db->fetchOne($select, __METHOD__);

        if (!$data) {
            return null;
        }
        return new self($data);
    }

    public static function getByEmail(string $email): ?self
    {
        $db = Db::getInstance();
        $select = "SELECT * FROM users WHERE `email` = :email";
        $data = $db->fetchOne($select, __METHOD__, [':email' => $email]);

        if (!$data) {
            return null;
        }
        return new self($data);
    }

    public static function getPasswordHash(string $password)
    {
        return sha1('nfoui3w' . $password);
    }
}
