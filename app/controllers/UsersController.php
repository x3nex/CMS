<?php
namespace App\Controllers;
use \App\Core\App;
use App\Core\AuthGuard;


AuthController::checkLogin();

class UsersController {
    public function index()
    {
        $users = App::get('database')->getAll('users');

//        return view('users', compact('users'));
        
        header('Content-Type: application/json');
        echo json_encode($users);
        return;
    }

    public function store()
    {
        App::get('database')->insert('users', [
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'role' => $_POST['role']
        ]);

        return redirect('users');
    }
   
    public function getCurrentUser()
    
   {

       $user = $_SESSION['user'];
       echo json_encode($user);
       return;

   }

}