<?php
namespace Base;
use App\Controller\Blog;
use App\Controller\User;

class Route
{
    private $controllerName;
    private $actionName;
    private $processed = false;
    private $routes;

    private function process()
    {
        $parts = parse_url($_SERVER['REQUEST_URI']);
        $path = $parts['path'];
        if (($route = $this->routes[$path] ?? null) !== null) {
            $this->controllerName = $route[0];
            $this->actionName = $route[1];
        } else {
            $parts = explode('/', $path);
            $this->controllerName = '\\App\\Controller\\' . ucfirst(strtolower($parts[1]));
            $this->actionName = strtolower($parts[2] ?? 'Index');

            if (!class_exists($this->controllerName)) {
                throw new RouteException('Can`t find controller' . $this->controllerName);
            }

        }

//        switch ($parts['path']) {
//            case '/user/login':
//                $controller = new User();
//                $controller->loginAction();
//                break;
//            case '/user/register':
//                $controller = new User();
//                $controller->registerAction();
//                break;
//            case '/blog':
//            case '/blog/index':
//                $controller = new Blog();
//                $controller->indexAction();
//                break;
//            default:
//                header("HTTP/1.0 404 Not Found");
//                break;
//        }
    }
    public function addRoute($path, $controllerName, $actionName)
    {
        $this->routes[$path] = [
            $controllerName,
            $actionName
        ];
    }
    public function getControllerName(): string
    {
        if (!$this->processed) {
            $this->process();
        }
        return $this->controllerName;
    }
    public function getActionName(): string
    {
        if (!$this->processed) {
            $this->process();
        }
        return $this->actionName . 'Action';
    }
}