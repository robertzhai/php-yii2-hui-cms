<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cms_role".
 *
 * @property integer $id
 * @property string $name
 * @property integer $create_time
 * @property integer $update_time
 */
class CmsRole extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_time', 'update_time'], 'integer'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'name'        => 'Name',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
