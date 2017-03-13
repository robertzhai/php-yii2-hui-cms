<?php

namespace app\controllers;


use app\library\Constant;

class LogoutController extends BaseController
{

    protected $_needLogin = false;

    public function actionIndex()
    {
        $this->_session->remove(Constant::SESSION_ADMIN_KEY);
        return $this->redirect('/login/index', 301);
    }

}
