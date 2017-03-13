<?php
/**
 * @desc   Log.php
 * @author robertzhai
 */

namespace app\library;


class Log
{

    public static function error($message, $data = array())
    {
        if ($data) {
            Yii::error($message . ', data: ' . json_encode($data, JSON_UNESCAPED_UNICODE));
        } else {
            Yii::error($message);
        }
    }

    public static function info($message, $data = array())
    {
        if ($data) {
            Yii::info($message . ', data: ' . json_encode($data, JSON_UNESCAPED_UNICODE));
        } else {
            Yii::info($message);
        }

    }

}