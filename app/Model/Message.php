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
    public function getIdSavedImage()
    {
        $db = Db::getInstance();
        $id = $db->lastInsertId();
        $sql = "SELECT id FROM posts WHERE id = $id";
        return $db->fetchOne($sql, __METHOD__, []);
    }
    public function getLastMessagesById($userId)
    {
        $db = Db::getInstance();
        $sql = "SELECT * FROM posts WHERE user_id = :user_id ORDER BY id DESC LIMIT 20";
        $result = $db->fetchAll($sql, __METHOD__, [':user_id' => $userId]);
        if (!$result) {
            return false;
        } else {
            return json_encode($result);
        }
    }
    public function checkUserRole($userId)
    {
        $db = Db::getInstance();
        $sql = "SELECT * FROM users WHERE id = :id";
        $result = $db->fetchOne($sql, __METHOD__, [':id' => $userId]);
        if ($result['user_role'] == 1) {
            return USER_ROLE;
        } else {
            return ADMIN_ROLE;
        }
    }
    public function deleteMessage($postId)
    {
        $db = Db::getInstance();
        $sql = "DELETE FROM posts WHERE id = :id";
        $db->exec($sql, __METHOD__, [':id' => $postId]);
    }
}
