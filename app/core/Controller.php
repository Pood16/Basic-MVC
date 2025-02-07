<?php

namespace App\Core;

abstract class Controller {
    
    protected function view($path,$data = []){
        extract($data);
        require_once __DIR__ . "/../views/{$path}.php";
    }
    
    protected function redirect($url){
        header("Location: {$url}");
        exit;
    }
    // ?
    protected function json($data){
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
