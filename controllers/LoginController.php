<?php

namespace app\controllers;

use app\library\Constant;
use app\library\Encrypt;
use app\library\Error;
use app\models\CmsAdmin;
use Yii;
use yii\web\Response;

class LoginController extends BaseController
{

    protected $_needLogin = false;

    public function actionIndex()
    {
        return $this->display('login/index.php');
    }

    public function actionAuth()
    {

        $username = $this->_request->post('username');
        $password = $this->_request->post('password');
        if (!$username || !$password) {
            $error = Error::getError(Error::PARAM_LOGIN_ERROR);
            return $this->jsonOutput($error);
        }
        $user = CmsAdmin::getByUserName($username);
        if ($user && $password == Encrypt::decrypt($user['password'])) {
            $userAdmin = array(
                'username' => $user['username'],
                'admin_id' => $user['admin_id'],
            );
            $this->_session->set(Constant::SESSION_ADMIN_KEY, $userAdmin);
            $data = array('errno' => Constant::API_SUCC_CODE, 'errmsg' => '');
            return $this->jsonOutput($data);
        } else {
            $error = Error::getError(Error::PARAM_LOGIN_ERROR);
            return $this->jsonOutput($error);
        }
    }

}
