<?php

namespace App\Controllers\Front;

use App\Core\Controller;
use App\Core\Auth;
use App\Core\Security;
use App\Models\User;
use App\Core\Session;

class AuthController extends Controller {

    public function login() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            

            $email = Security::sanitize($_POST['email']);
            $password = $_POST['password'];

            $user = User::where('email', $email)->first();
         

            if ($user && password_verify($password, $user->password)) {
                // Start session on successful login
                Session::start();
                Session::set('user_role', $user->role);
                Session::set('logged_in', true);

                // Redirect 
                if ($user->role === 'admin') {
                    $this->redirect('/welcomeAdmin');
                } else {
                    $this->redirect('/welcomeUser');
                }
            }

            // Handle login error
            $this->view('login', ['error' => 'Invalid credentials']);
        }

        $this->view('login');
    }

    public function register() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            if (!Security::validateCsrfToken($_POST['csrf_token'])) {
                $this->redirect('/login');
            }

            $data = Security::sanitize($_POST);
        
            
            // Check if there are existing users
            $isFirstUser = User::count() == 0;
            $role = $isFirstUser ? 'admin' : 'user';
          
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => password_hash($data['password'], PASSWORD_DEFAULT),
                'role' => $role
            ]);
           

            // Auth::login($user->toArray());
            $this->redirect('/login');
        }

        $this->view('register', ['csrf_token' => Security::generateCsrfToken()]);
    }

    public function logout() {
        Auth::logout();
        $this->redirect('/login');
    }
}
