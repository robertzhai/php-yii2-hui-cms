<?php

namespace app\controllers;

use app\library\Constant;
use Yii;
use yii\web\Response;

class BaseController extends \yii\web\Controller
{

    protected $_needLogin = true;

    protected $_request;

    protected $_session;

    protected $_admin;

    protected $_viewData = array();

    public function init()
    {
        parent::init();
        $this->_request = Yii::$app->request;
        $this->_session = Yii::$app->session;
        if ($this->_needLogin) {
            $this->checkLogin();
        }
    }

    protected function checkLogin()
    {
        $user = $this->_session->get(Constant::SESSION_ADMIN_KEY);
        if (!$user || !isset($user['username'])) {
            return $this->redirect('/login/index', 301);
        }
        $this->_admin = $user;
        $this->_viewData['admin'] = $user;
    }

    public function renderPage($file = 'index.php')
    {
        $view = Yii::$app->view;
        $view->params['data'] = $this->_viewData;
        return $this->render($file);
    }

    public function display($file = 'login/index.php')
    {
        $view = Yii::$app->view;
        $view->params['data'] = $this->_viewData;
        return $this->renderFile('@app/views/' . $file);
    }

    protected function jsonOutput($data)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $data;
    }


}
