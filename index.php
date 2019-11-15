<?php
require 'utils.php';

$url = $_SERVER['REQUEST_URI'];
var_dump($url);
try {

    if (isset($url) && $url != '/') {
        $urlContents = explode('/', filter_var($url, FILTER_SANITIZE_URL));
        array_shift($urlContents);
        $controller = ucfirst(strtolower($urlContents));
        $controllerClass = $controller . 'Controller.php';
        $controllerFile = dirname(__DIR__) . '/controllers/' . $controllerClass;
        if (file_exists($controllerFile)) {
            require($controllerFile);
            $this->_controller = new $controllerClass($urlContents);
        } else {
            throw new Exception('Page introuvable');
        }
    } else //index
    {
        require_once dirname(__DIR__) . '/controllers/HomeController.php';
        $this->_controller = new HomeController(array('index'));
    }

}catch(Exception $e)
{
    $error = $e->getMessage();
}
