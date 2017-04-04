<?php
namespace App\Controllers;
use \App\Core\App;
use App\Core\AuthGuard;

AuthController::checkLogin();

class AdminDashboardController {

     public function index()
    {
    	/// check if user is logged in
    	// AuthController::checkLogin();
    	/// check if users is admin

    	// prepare analytical data 

    	/// prepare functionalities for editing with super permissions

        // $users = App::get('database')->getAll('users');
        $pageTitle = "Admin Dashboard";
        return view('admin/dashboard/index', compact('users', 'pageTitle')); //['users' => $users]
    }

}