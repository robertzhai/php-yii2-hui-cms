<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cms_admin".
 *
 * @property integer $admin_id
 * @property string $username
 * @property string $password
 * @property string $lastloginip
 * @property integer $lastlogintime
 * @property string $email
 * @property string $realname
 * @property integer $status
 */
class CmsAdmin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'admin_id' => 'Admin ID',
            'username' => 'Username',
        ];
    }

    public static function getByUserName($username)
    {
        $user = self::find()->where(['username' => $username])->asArray()->one();
        if ($user) {
            return $user;
        }
        return false;
    }

    protected function rawSql($username)
    {
        echo self::find()->where(['username' => $username])->createCommand()->getRawSql();;
    }
}
