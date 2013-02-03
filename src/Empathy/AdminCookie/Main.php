<?php

namespace Empathy\AdminCookie;

class Main
{

    public static function set_returning_admin_user()
    {
        $now = new \DateTime();
        $now->add(new \DateInterval('P2Y'));
        $stamp = $now->getTimestamp();
        if(!is_returning_admin_user()) {
            setcookie('returning_admin_user', $stamp, $stamp);
        }
    }

    public static function is_returning_admin_user()
    {
        return isset($_COOKIE['returning_admin_user'])? true: false;
    }

    function get_returning_admin_expire()
    {
        return date('d/m/Y H:i:s', $_COOKIE['returning_admin_user']);
    }
}
