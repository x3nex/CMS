<?php

namespace App\Core;


class AuthGuard
{

    public static function check(){

        if(!$_SESSION['user']) {

            return redirect('login');
        }

        return;
    }
	static function checkAuthentication($isAdmin = false){
        // 
    }
    static function hashPassword($pass){
    	$hashedPassword = md5($pass);
    	return $hashedPassword;
    }
}