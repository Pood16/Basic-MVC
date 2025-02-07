<?php

namespace App\Core;
use App\Core\Session;

class Auth {
    public static function check(){
        return isset($_SESSION['user_id']);
    }
    
    public static function user() {
        return self::check() ? $_SESSION['user'] : null;
    }
    
    public static function login($user){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user'] = $user;
    }
    
    public static function logout(){
        Session::destroy();
    }
}
