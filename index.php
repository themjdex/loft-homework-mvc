<?php

use Base\Route;
use Base\RouteException;

include 'vendor/autoload.php';

$parts = parse_url($_SERVER['REQUEST_URI']);

$route = new Route();
///** @uses \App\Controller\User::loginAction() */
$route->addRoute('/user/go', \App\Controller\User::class, 'login');
///** @uses \App\Controller\User::registerAction() */
//$route->addRoute('/user/register', \App\Controller\User::class, 'register');
///** @uses \App\Controller\Blog::indexAction() */
//$route->addRoute('/blog', \App\Controller\Blog::class, 'index');
//$route->addRoute('/blog/index', \App\Controller\Blog::class, 'index');

$controllerName = $route->getControllerName();
$controller = new $controllerName;

$actionName = $route->getActionName();
if (!method_exists($controller, $actionName)) {
    throw new RouteException('Action ' . $actionName . ' not found in ' . $controllerName);
}
$controller->$actionName();