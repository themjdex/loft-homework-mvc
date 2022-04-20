<?php
namespace App\Controller;
use Base\AbstractController;

class Blog extends AbstractController
{
    function indexAction()
    {
        if (isset($_GET['redirect'])) {
            $this->redirect('/user/register');
        }
        echo __METHOD__;
    }
}