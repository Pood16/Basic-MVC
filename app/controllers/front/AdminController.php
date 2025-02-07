<?php

namespace App\Controllers\Front;

use App\Core\Controller;
use App\Core\Session;


class AdminController extends Controller {

    public function welcomeAdmin(){
  
        if (!Session::has('logged_in') && Session::get('user_role') !== 'admin'){
         
            $this->redirect('login');;
          
        }
        $this->view('welcomeAdmin');
    }

}
