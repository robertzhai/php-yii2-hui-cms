<?php

namespace app\controllers;

use app\library\Constant;
use app\library\Error;
use app\library\Log;
use app\models\CmsRole;
use app\models\WechatMenuUrl;
use Yii;
use yii\data\Pagination;

class RoleController extends BaseController
{
    const PAGE_SIZE = 10;

    public function actionIndex()
    {
        $query = CmsRole::find();
        $pages = new Pagination(['totalCount' => $query->count()]);
        $pages->setPageSize(self::PAGE_SIZE);
        $roles = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->asArray()->all();
        $this->_viewData['list'] = $roles;
        $this->_viewData['pages'] = $pages;
        return $this->renderPage("index.php");
    }

    public function actionEdit()
    {
        if ($this->_request->isPost) {
            $name = $this->_request->post('name');
            $id = intval($this->_request->post('id'));
            if (!$name || $id < 0) {
                $error = Error::getError(Error::UPDATE_FAIL_ERROR);
                return $this->jsonOutput($error);
            }
            $roleData = CmsRole::findOne($id);
            if ($roleData) {
                $roleData->name = $name;
                if ($roleData->update() !== false) {
                    // update successful
                    $data = array('errno' => Constant::API_SUCC_CODE, 'errmsg' => '');
                    return $this->jsonOutput($data);
                } else {
                    // update failed
                    Log::error("更新角色失败", $this->_request->post);
                }
            }
            $data = array('errno' => Error::UPDATE_FAIL_ERROR, 'errmsg' => '');
            return $this->jsonOutput($data);
        } else {
            $id = intval($this->_request->get('id'));
            $roleData = CmsRole::find()->where(['id' => $id])->asArray()->one();
            $this->_viewData['list_item'] = $roleData;
            return $this->renderPage("edit.php");
        }

    }


}
