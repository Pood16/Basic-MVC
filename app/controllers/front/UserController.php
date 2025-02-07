<?php

namespace App\Controllers\Front;

use App\Core\Controller;


class UserController extends Controller {

    public function welcomeUser(){
        $this->view('welcomeUser');
    }

}
