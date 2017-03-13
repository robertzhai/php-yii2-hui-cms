<?php
/**
 * @desc   Encrypt.php
 * @author robertzhai
 */

namespace app\library;


use Yii;

class Encrypt
{
    private static $secretKey = 'xx?&j';

    public static function encrypt($str)
    {
        return base64_encode(Yii::$app->getSecurity()->encryptByPassword($str, self::$secretKey));
    }

    public static function decrypt($str)
    {
        return Yii::$app->getSecurity()->decryptByPassword(base64_decode($str), self::$secretKey);;
    }


}