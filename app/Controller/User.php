<?php
namespace App\Controller;
use Base\AbstractController;
use App\Model\User as UserModel;
use Base\View as View;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class User extends AbstractController
{
    private $_twig;
    private $data;

    public function loginAction()
    {
        $email = trim($_POST['email']);

        if ($email) {
            $password = $_POST['password'];
            $user = UserModel::getByEmail($email);
            if (!$user) {
                $this->view->assign('error', 'Неверный логин и/или пароль');
            }

            if ($user) {
                if ($user->getPassword() != UserModel::getPasswordHash($password)) {
                    $this->view->assign('error', 'Неверный логин и/или пароль');
                } else {
                    $_SESSION['id'] = $user->getId();
                    $this->redirect('/blog');
                }
            }
        }
        return $this->view->render('User/register.phtml', [
            'user' => UserModel::getById((int) $_GET['id'])
        ]);

    }
    function registerAction()
    {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $passwordRetry = trim($_POST['passwordRetry']);
        $success = true;

        if (isset($_POST['email'])) {
            if (!$email) {
                $this->view->assign('error', 'Почта должна быть указана');
                $success = false;
            }
            if (!$name) {
                $this->view->assign('error', 'Имя не может быть пустым');
                $success = false;
            }
            if (!$password) {
                $this->view->assign('error', 'Пароль не может быть пустым');
                $success = false;
            }
            if (!$passwordRetry) {
                $this->view->assign('error', 'Нужно ввести пароль повторно');
                $success = false;
            }

            if ($password != $passwordRetry) {
                $this->view->assign('error', 'Введенные пароли не совпадают');
                $success = false;
            }

            if (mb_strlen($password) <= 3) {
                $this->view->assign('error', 'Пароль должен быть не менее 4 символов');
                $success = false;
            }

            $user = UserModel::getByEmail($email);
            if ($user) {
                $this->view->assign('error', 'Такая почта уже занята');
                $success = false;
            }
            if ($success) {
                $user = (new UserModel())
                    ->setName($name)
                    ->setEmail($email)
                    ->setPassword(UserModel::getPasswordHash($password));

                $user->save();

                $_SESSION['id'] = $user->getId();

                $this->setUser($user);

                $this ->redirect('/blog');
            }
        } else {
            $this->view->assign('error', 'Вы не указали почту при регистрации или пытаетесь войти без авторизации');
            die;
        }

        return $this->view->render('User/register.phtml', [
            'user' => UserModel::getById((int) $_GET['id'])
        ]);
    }

    public function forgotPasswordAction()
    {

    }

    /**
     * @return \Twig\Environment
     */
    public function getTwig()
    {
        if (!$this->_twig) {
            $path = './app/View/User' ;
            $loader = new FilesystemLoader($path);
            $this->_twig = new Environment($loader, array('cache' => $path . '/compil'));
        }
        return $this->_twig;
    }

    public function profileAction()
    {
        $twig = $this->getTwig();
        $this->data = UserModel::getById((int) $_SESSION['id']);
        ob_start();
        echo $twig->render('profile.twig', ['view' => $this->data]);
        return ob_end_flush();
    }

    public function logoutAction()
    {
        session_destroy();
        $this->redirect('/user/login');
    }
}