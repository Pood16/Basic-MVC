<?php

namespace App\Controllers\Front;

use App\Core\Controller;
use App\Core\Auth;
use App\Core\Security;
use App\Models\User;
use App\Core\Session;
use App\Core\Validator;

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

        /*
        *Get request
        */
        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            Session::remove('user_exist');
            return $this->view('register', ['csrf_token' => Security::generateCsrfToken()]);
        }

        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $validator = new Validator();
            /*
            *sanitize the post data
            */
            $postData = Security::sanitize($_POST);
            /*
            validate the post data :
            */
            $data = [
                'name' => $postData['name'],
                'email' => $postData['email'],
                'password' => $postData['password']
            ];
            /*
            set global rules : 
            */
            $rules = [
                'name' => 'required|min:3',
                'email' => 'required|email',
                'password' => 'required|min:4'
            ];

            if ($validator->validate($data, $rules)) {
                // check if email is taken 
                if(User::Where('email', $data['email'])->exists()){
            
                    return $this->view('/register', ['user_exist' => 'An account with this email exists!']);
                }

                $data['password'] = Security::hashPassword($data['password']);
                // the first user is admin 
                $isFirstUser = User::count() == 0;
                $role = $isFirstUser ? 'admin' : 'user';
            
                $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => $data['password'],
                    'role' => $role
                ]);
                return $this->redirect('/login');
            }
            $errors = Session::set('errors', $validator->getErrors());
            return $this->redirect('/register');          
        }
        
    }

    public function logout() {
        Auth::logout();
        $this->redirect('/login');
    }
}
