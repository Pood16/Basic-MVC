<?php

namespace App\Core;

class Security{

    // XSS : Sanitize user input
    public static function sanitize($data) {
        if (is_array($data)) {
            return array_map([self::class, 'sanitize'], $data);
        }
        return trim(htmlspecialchars($data, ENT_QUOTES, 'UTF-8'));
    }

    // CSRF Protection
    public static function generateCSRFToken(){
        if (!isset($_SESSION)) session_start();
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        return $_SESSION['csrf_token'];
    }

    public static function validateCSRFToken($token){
        if (!isset($_SESSION)) session_start();
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }

    // Password hashing
    public static function hashPassword($password){
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function verifyPassword($password, $hash){
        return password_verify($password, $hash);
    }

    // XSS Protection
    public static function escapeOutput($data){
        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    }

    

}

