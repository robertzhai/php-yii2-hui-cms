<?php
/**
 * @desc   Error.php
 * @author robertzhai
 */

namespace app\library;


class Error
{

    const PARAM_LOGIN_ERROR = 1001;
    const UPDATE_FAIL_ERROR = 2001;

    private static $msg = array(
        self::PARAM_LOGIN_ERROR => '用户名或密码错误',
        self::UPDATE_FAIL_ERROR => '更新失败'
    );

    public static function getError($errno)
    {
        $errmsg = isset(self::$msg[$errno]) ? self::$msg[$errno] : '';
        return array('errno' => $errno, 'errmsg' => $errmsg);
    }

}