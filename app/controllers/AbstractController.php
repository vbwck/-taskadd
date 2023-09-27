<?php


namespace app\controllers;

use app\core\controllerable;
use app\core\View;

abstract class AbstractController implements controllerable
{
    protected $view;

    protected $model;

    public function __construct()
    {
        $this->view = new View();
    }
}