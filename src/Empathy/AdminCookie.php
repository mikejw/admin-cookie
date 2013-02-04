<?php

namespace Empathy;

class AdminCookie
{

    public static function set_returning_admin_user($path)
    {
        if(strpos($path, 'http://') === 0) {
            $path = str_replace('http://', '', $path);
        }
        // remove host
        $path_arr = explode('/', $path);
        array_shift($path_arr);
        $path = '/'.implode('/', $path_arr);
        if(!preg_match('/\/$/', $path)) {
            $path .= '/';
        }       
        $now = new \DateTime();
        $now->add(new \DateInterval('P2Y'));
        $stamp = $now->getTimestamp();
        if(!self::is_returning_admin_user()) {           
            setcookie('returning_admin_user', $stamp, $stamp, $path);
        }
    }

    public static function is_returning_admin_user()
    {
        return isset($_COOKIE['returning_admin_user'])? true: false;
    }

    public static function get_returning_admin_expire()
    {
        return date('d/m/Y H:i:s', $_COOKIE['returning_admin_user']);
    }
}
