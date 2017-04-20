<?php
namespace App\Controllers;

use App\Core\App;
use App\Core\AuthGuard;

class AuthController {

    public function showLogin()
    {
        return view('login');
    }
    public function loginUser(){
        //
        $pass = AuthGuard::hashPassword($_POST['password']);
        $user = App::get('database')->authenticate($_POST['username'], $pass);
        if($user){
            $_SESSION['userRole'] = $user->role;
            unset($user->password);
            $_SESSION['user'] = $user;
            /// create auth token for session
            $token = uniqid("pos_");
            $_SESSION['userToken'] = $token;
            //  save auth token to database user table
            App::get('database')->update('users', ['token'=>$token], $user->id);
            
            return $user->role == 0 ? redirect('home') : redirect('admin/dashboard');
        }

        else {
           
            return redirect('login');
        }
    }
    public static function checkLogin()
    {
        $token = isset($_SESSION['userToken']) ? $_SESSION['userToken'] : '123';
        $user = App::get('database')->findBy('users', 'token', $token);
        
        if(!$user) {
            
            return redirect('login');        
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        session_destroy();
        return redirect('login');
    }

}