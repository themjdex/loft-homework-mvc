<?php
include 'vendor/autoload.php';

use App\Controller\User;
use Base\Application;

$app = new Application();

$userController = new User();
$userController->indexAction();