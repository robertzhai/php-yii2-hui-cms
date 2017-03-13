<?php

namespace app\controllers;

class ErrorController extends BaseController
{

    protected $_needLogin = false;
    
    public function action404()
    {
        return $this->display("error/404.html");
    }
    public function actionServer()
    {
        return $this->display("error/server.html");
    }

}
