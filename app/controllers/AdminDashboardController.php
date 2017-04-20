<?php
namespace App\Controllers;
use \App\Core\App;
use App\Core\AuthGuard;

AuthController::checkLogin();

class AdminDashboardController {

     public function index()
    {

        // $users = App::get('database')->getAll('users');
        $pageTitle = "Admin Dashboard";
        return view('admin/dashboard/index', compact('users', 'pageTitle')); //['users' => $users]
    }

}