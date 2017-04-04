<?php
namespace App\Controllers;
use App\Core\AuthGuard;


AuthController::checkLogin();

class PagesController {
    public function home()
    {
    // $_SESSION['mykey'] = "123123";
    return view('index');
    }

    public function contact()
    {
        // dd($_SESSION['mykey']);
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }
}