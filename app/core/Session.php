<?php

namespace App\Core;

class Session {

    
    public static function start(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null) {
        return $_SESSION[$key] ?? $default;
    }

    public static function has($key) {
        return isset($_SESSION[$key]);
    }

    public static function remove($key) {
        unset($_SESSION[$key]);
    }

    public static function destroy(){
        session_start();
        $_SESSION = []; // Clear session array
        session_unset(); // Unset session variables
        session_destroy(); // Destroy session
    }
}
