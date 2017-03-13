<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wechat_menu_url".
 *
 * @property integer $id
 * @property string $url_key
 * @property string $name
 * @property string $url
 * @property integer $create_time
 * @property integer $update_time
 */
class WechatMenuUrl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wechat_menu_url';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_time', 'update_time'], 'integer'],
            [['url_key'], 'string', 'max' => 30],
            [['name'], 'string', 'max' => 100],
            [['url'], 'string', 'max' => 500],
            [['url_key'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url_key' => 'Url Key',
            'name' => 'Name',
            'url' => 'Url',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
