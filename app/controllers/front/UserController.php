<?php

namespace App\Controllers\Front;

use App\Core\Controller;
use App\Core\Session;
use App\Core\Security;
use App\Models\User;


class UserController extends Controller {



    // the user dash
    public function user(){

        // dd(Security::validateCSRFToken(Session::get('csrf_token')));
        if (!Session::has('logged_in') && Session::get('user_role') !== 'user' && Session::has('csrf_token')){
            $this->redirect('login'); 
        }
        $user = User::find($_SESSION['user_id']);

        $this->view('user/user', ['user' => $user]);
    }

}

