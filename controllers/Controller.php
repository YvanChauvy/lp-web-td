<?php


abstract class Controller
{
    public function __construct($url)
    {
        if(is_numeric($url[1]))
        {
            $params = array_splice($url, 1, sizeof($url));
            $this->show($params);
            return;
        }
        $method = $url[1];
        $params = array_splice($url, 2, sizeof($url));
        if(is_null($method))
            $this->index();
        else if (method_exists($this, $method))
            $this->$method($params);
        else
            throw new Exception('Page introuvable');
    }

}