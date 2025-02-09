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

        //POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!Security::validateCsrfToken($_POST['csrf_token'])) {
                $this->redirect('/login');
            }

            $validator = new Validator();
            
        
            // sanitize the post data
            $data = Security::sanitize($_POST);

            /*
            validate the post data :
            */

            //check for empty inputs
            $validator->required($data['name'], 'name');
            $validator->required($data['email'], 'email');
            $validator->required($data['password'], 'password');

            // set min and max for name and password
            $validator->min($data['name'], 4, 'name');
            $validator->min($data['password'], 4, 'password');
            $validator->max($data['password'], 8, 'password');
            // check for email format
            $validator->email($data['email']);
            // check if email is taken 
            if(User::Where('email', $data['email'])->exists()){
                $validator->emailExist();
            }

            /*
             check if there is no errors :
            */

            if ($validator->hasErrors()){
                $this->view('register', ['errors' => $validator->getErrors()]);
            }


            // the first user is admin 
            $isFirstUser = User::count() == 0;
            $role = $isFirstUser ? 'admin' : 'user';
          
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => password_hash($data['password'], PASSWORD_DEFAULT),
                'role' => $role
            ]);


            //clear errors
            // $validator->clearErrors();
            // Auth::login($user->toArray());
            $this->redirect('/login');
        }
        //Get request
        
        $this->view('register', ['csrf_token' => Security::generateCsrfToken()]);
    }

    public function logout() {
        Auth::logout();
        $this->redirect('/login');
    }
}
