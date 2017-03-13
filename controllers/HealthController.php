<?php

namespace app\controllers;

use app\library\Constant;
use app\library\Error;
use app\library\Log;
use app\models\WechatMenuUrl;
use Yii;

class HealthController extends BaseController
{

    public function actionIndex()
    {
        $menuUrl = WechatMenuUrl::find()->asArray()->all();
        $this->_viewData['list'] = $menuUrl;
        return $this->renderPage("index.php");
    }

    public function actionEdit()
    {
        if ($this->_request->isPost) {
            $url = $this->_request->post('url');
            $id = intval($this->_request->post('id'));
            if (!$url || $id < 0) {
                $error = Error::getError(Error::PARAM_LOGIN_ERROR);
                return $this->jsonOutput($error);
            }
            $menuUrl = WechatMenuUrl::findOne($id);
            if ($menuUrl) {
                $menuUrl->url = $url;
                if ($menuUrl->update() !== false) {
                    // update successful
                    $data = array('errno' => Constant::API_SUCC_CODE, 'errmsg' => '');
                    return $this->jsonOutput($data);
                } else {
                    // update failed
                    Log::error("更新菜单失败", $this->_request->post);
                }
            }
            $data = array('errno' => Error::UPDATE_FAIL_ERROR, 'errmsg' => '');
            return $this->jsonOutput($data);
        } else {
            $id = intval($this->_request->get('id'));
            $menuUrl = WechatMenuUrl::find()->where(['id' => $id])->asArray()->one();
            $this->_viewData['list_item'] = $menuUrl;
            return $this->renderPage("edit.php");
        }

    }


}
