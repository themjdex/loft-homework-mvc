<?php
namespace App\Model;
use Base\AbstractModel;
use Base\Db;

class Message extends AbstractModel
{
    private $message;
    private $userId;

    public function __construct($message, $userId)
    {
        $this->message = $message;
        $this->userId = $userId;
    }


    public function saveMessage()
    {
        $db = Db::getInstance();
        $sql = "INSERT INTO posts (`user_id`, `created_date`, `message`) VALUES (:user_id, CURDATE(), :message)";
        $db->exec($sql, __METHOD__, [
            ':user_id' => $this->userId,
            ':message' => $this->message
        ]);
    }
    public function showLastMessages()
    {
        $db = Db::getInstance();
        $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 20";
        return $db->fetchAll($sql, __METHOD__, []);
    }
}
