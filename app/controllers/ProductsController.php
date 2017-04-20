<?php
namespace App\Controllers;
use \App\Core\App;
use App\Core\AuthGuard;


AuthController::checkLogin();

class ProductsController {
    public function index()
    {

        if(!isset($_GET['id'])) {
            $products = App::get('database')->getAll('products');
        } else {
            $products = App::get('database')->getAllProducts($_GET['id']);
        }

//        return view('products', compact('products'));
     
        header('Content-Type: application/json');
        echo json_encode($products);
        return;
    }

    public function store()
    {
        App::get('database')->insert('products', [
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'category_id' => $_POST['category_id']
        ]);

        return redirect('products');
    }
}