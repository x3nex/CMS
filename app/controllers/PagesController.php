<?php
namespace App\Controllers;
use App\Core\AuthGuard;




class PagesController {
    public function home()
    {
		AuthController::checkLogin();
		
    return view('index');
    }

    public function welcome()
    {
      
        return view('welcome');
    }

}