<?php
$url = $_SERVER['REQUEST_URI'];
try {

    if (isset($url)) {
        $urlContents = explode('/', filter_var($url, FILTER_SANITIZE_URL));
        array_shift($urlContents);
        $controller = ucfirst(strtolower($urlContents[0]));
        $controllerClass = $controller . 'Controller';
        $controllerFile = dirname(__DIR__) . '/controllers/' . $controllerClass;
        if (file_exists($controllerFile)) {
            require($controllerFile);
            $this->_controller = new $controllerClass($url);
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
    $this->_view = new View('Error', 'Erreur | A.P.P.M',array('error' => $error));
}
