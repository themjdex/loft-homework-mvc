<?php
namespace App\Controller;

use Base\AbstractController;
use App\Model\Message;
use Base\Db;

class Blog extends AbstractController
{
    public $messages;

    function indexAction()
    {
        if (!$this->user) {
            $this->redirect('/user/register');
        }

        $userId = $_SESSION['id'];
        $message = new Message('', $userId);
        $this->messages = $message->showLastMessages();

        return $this->view->render('Blog/index.phtml', [
            'posts' => $this->messages
        ]);
    }

    public function addAction()
    {
        $userMessage = $_POST['message'];
        $userId = $_SESSION['id'];
        if (!$userMessage) {
            $this->view->assign('error', 'Нужно ввести текст');
            exit();
        }
        $message = new Message($userMessage, $userId);
        $message->saveMessage();
        $this->messages = $message->showLastMessages();

        return $this->view->render('Blog/index.phtml', [
            'posts' => $this->messages
        ]);

    }

}