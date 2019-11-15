<?php


class MovieController extends Controller
{
    public function index()
    {
        utils::getBlock('views/header.html');
        utils::getBlock('views/nav.php');
        utils::getBlock('views/index.html');
    }

    public function displayMovie(){

    }
}