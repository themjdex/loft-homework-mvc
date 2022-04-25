<?php
namespace App\Controller;

use Base\AbstractController;
use App\Model\Message;
use Base\Db;
use Intervention\Image\Image;

class Blog extends AbstractController
{
    public $messages;
    public $posts;
    public $userRole = USER_ROLE;

    function indexAction()
    {
        if (!$this->user) {
            $this->redirect('/user/register');
        }

        if (!isset($_POST['message'])) {
            $userId = $_SESSION['id'];
            $message = new Message('', $userId);
            $this->messages = $message->showLastMessages();
            $this->userRole = $message->checkUserRole($userId);

            return $this->view->render('Blog/index.phtml', [
                'posts' => $this->messages, 'role' => $this->userRole
            ]);
        } else {
            header('Location: http://week3-mvc/blog');
            $userMessage = $_POST['message'];
            $userId = $_SESSION['id'];
            if (!$userMessage) {
                $this->view->assign('error', 'Нужно ввести текст');
                exit();
            }
            $message = new Message($userMessage, $userId);
            $message->saveMessage();
            $this->messages = $message->showLastMessages();

            if (!empty($_FILES['userfile']['tmp_name'])) {
                $postId = $message->getIdSavedImage()['id'];
                $id = $postId['id'];
                $fileContent = file_get_contents($_FILES['userfile']['tmp_name']);
                file_put_contents('./images/' . $postId . '.png', $fileContent);
                $source = PROJECT_ROOT_DIR . '/images/' . $postId . '.png';
                $image = (new \Intervention\Image\Image)->make($source)->resize(200, null, function ($image) {
                    $image->aspectRatio();
                });
                self::watermark($image);


            } else {
                $this->view->assign('error', 'Нет сообщения');
                exit();
            }

            return $this->view->render('Blog/index.phtml', [
                'posts' => $this->messages, 'role' => $this->userRole
            ]);

        }
    }

    public static function watermark(Image $image)
    {
        $image->text(
            "Блог\nобо\nвсем",
            50,
            15,
            function ($font) {
                $font->file(PROJECT_ROOT_DIR . '/fonts/arial.ttf')->size('24');
                $font->color(array(255, 20, 10, 0.5));
                $font->align('left');
                $font->valign('top');
            });
    }
    public function mypostAction()
    {
        $userId = $_SESSION['id'];
        $message = new Message('', $userId);
        $json = $message->getLastMessagesById($userId);
        if (!$json) {
            return $this->view->render('Blog/index.phtml', [
                'posts' => 'Сообщений нет'
            ]);
        } else {
            $this->posts = json_decode($json, true);
            return $this->view->render('Blog/index.phtml', [
                'posts' => $this->posts, 'role' => $this->userRole
            ]);
        }
    }

    public function deleteAction()
    {
        header('Location: http://week3-mvc/blog');
        $userId = $_SESSION['id'];
        $message = new Message('', $userId);
        $postId = (int) $_POST['postId'];
        $message->deleteMessage($postId);
        $this->messages = $message->showLastMessages();

        return $this->view->render('Blog/index.phtml', [
            'posts' => $this->messages, 'role' => ADMIN_ROLE
        ]);
    }
}