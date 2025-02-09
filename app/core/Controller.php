<?php

namespace App\Core;

abstract class Controller {
    
    protected function view($path,$data = []){
        extract($data);
        require_once __DIR__ . "/../views/{$path}.php";
    }
    protected function viewAdmin($path,$data = []){
        extract($data);
        require_once __DIR__ . "/../views/admin/{$path}.php";
    }
    protected function viewUser($path,$data = []){
        extract($data);
        require_once __DIR__ . "/../views/user/{$path}.php";
    }
    protected function viewAuth($path,$data = []){
        extract($data);
        require_once __DIR__ . "/../views/auth/{$path}.php";
    }
    
    protected function redirect($url){
        header("Location: {$url}");
        exit;
    }
    
}
