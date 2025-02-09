<?php

namespace App\Controllers\Front;

use App\Core\Controller;
use App\Core\Session;
use App\Core\Security;
use App\Models\User;


class AdminController extends Controller {

    public function admin(){
  
        if (!Session::has('logged_in') && Session::get('user_role') !== 'admin' && Security::validateCSRFToken(Session::get('csrf_token'))){
         
            $this->redirect('login');
          
        }
        $admin = User::find($_SESSION['user_id']);
        $this->viewAdmin('admin', ['admin' => $admin] );
    }


    
    // get all users
    public function getAllUsers() {
        $users = User::all();
        
    }

    // Find a user by ID
    public  function getUserById($id) {
        $user = User::find($id);

        
    }

    // Update a user's email
    public function updateUser($id, $email) {
        $user = User::find($id);

        if ($user) {
            $user->update(['email' => $email]);
        }
    }

    // Delete a user
    public function deleteUser($id) {
        $user = User::find($id);

        if ($user) {
            $user->delete();
        }
         
    }

}
