<?php

namespace app\models;

use Yii;
use yii\data\Pagination;


class BaseModel extends \yii\db\ActiveRecord
{

    public static function getOne($condition)
    {
        $data = self::find()->where($condition)->asArray()->one();
        if ($data) {
            return $data;
        }
        return false;
    }

    public static function getPageData($condition, $page = 1, $pagesize = 1)
    {
        $data = self::find()->andWhere($condition);
        $pages = new Pagination(['totalCount' => $data->count(), 'pageSize' => $pagesize]);
        $modeldata = $data->orderBy(['id' => SORT_DESC])->offset($pages->offset)->limit($pages->limit)->asArray()->all();

        return [
            'modeldata' => $modeldata,
            'pages'     => $pages,
        ];

    }

    protected function getSql($condition)
    {
        echo self::find()->where($condition)->createCommand()->getRawSql();;
    }


}
