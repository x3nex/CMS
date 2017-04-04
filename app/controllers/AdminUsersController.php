<?php
namespace App\Controllers;
use \App\Core\App;
use App\Core\AuthGuard;

class AdminUsersController {

    public function index()
    {
        $users = App::get('database')->getAll('users');
        return view('admin/users/index', compact('users')); //['users' => $users]
    }

    /*
     * Displays edit form
     */
    public function edit()
    {
        $id = (int)$_GET['id'];
        $user = App::get('database')->find('users', $id);

        return view('admin/users/edit', compact('user'));
    }

    /*
    Update the task
    */
    public function update()
    {
        if(!isset($_POST['role'])) {
            $_POST['role'] = 0;
        }
        $_POST["password"] =  AuthGuard::hashPassword($_POST['password']);
        App::get('database')->update('users', $_POST, $_POST['id']);
        return redirect('admin/users');
    }

    public function delete()
    {
        $id = $_GET['id'];
        App::get('database')->delete('users',$id);
        return redirect('admin/users');
    }

    public function create()
    {
        return view('admin/users/create');
    }

    public function insert()
    {
        $_POST["password"] =  AuthGuard::hashPassword($_POST['password']);
        App::get('database')->insert('users', $_POST);

        return redirect('admin/users');
    }
}
