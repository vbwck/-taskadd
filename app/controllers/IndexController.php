<?php

namespace app\controllers;


class IndexController extends AbstractController
{

    public function index(){
        $this->view->render('index_index');
    }
}