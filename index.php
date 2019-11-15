<?php
require 'utils.php';
require __DIR__ . '/controllers/Controller.php';

$url = $_SERVER['REQUEST_URI'];
try {

    if (isset($url) && $url != '/') {
        $urlContents = explode('/', filter_var($url, FILTER_SANITIZE_URL));
        array_shift($urlContents);
        $controller = ucfirst(strtolower($urlContents[0]));
        $controllerClass = $controller . 'Controller.php';
        $controllerFile = __DIR__ . '/controllers/' . $controllerClass;
        if (file_exists($controllerFile)) {
            require($controllerFile);
            $this->_controller = new $controllerClass($urlContents);
        } else {
            throw new Exception('Page introuvable');
        }
    } else //index
    {
        require_once __DIR__ . '/controllers/HomeController.php';
        new HomeController(array('index'));
    }

}catch(Exception $e)
{
    $error = $e->getMessage();
}
