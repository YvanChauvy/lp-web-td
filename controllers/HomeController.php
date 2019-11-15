<?php
class HomeController extends Controller {

    protected function index()
    {
        utils::getBlock('views/header.html');
        utils::getBlock('views/nav.php');
        utils::getBlock('views/index.html');
    }
}