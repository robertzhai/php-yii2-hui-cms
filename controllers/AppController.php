<?php

namespace app\controllers;

use Yii;

class AppController extends BaseController
{

    public function actionIndex()
    {
        return $this->renderPage("index.php");
    }

    public function actionWelcome()
    {
        return $this->display("app/welcome.php");
    }


}
