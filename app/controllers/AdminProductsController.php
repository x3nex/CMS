<?php
namespace App\Controllers;
use \App\Core\App;
use App\Core\AuthGuard;


AuthController::checkLogin();

class AdminProductsController {

    public function index()
    {
        $products = App::get('database')->getAll('products', " ORDER BY category_id");
        $limitedProducts = App::get('database')->getAllWithFields('products', ['id', 'price']);
        return view('admin/products/index', ['products' => $products, 'categories'=>AdminProductsController::categories()]);
        //compact('products')); //['products' => $products]
    }

    /*
     * Displays edit form
     */
    public function edit()
    {

        $id = (int)$_GET['id'];
        $product = App::get('database')->find('products', $id);

        return view('admin/products/edit', ['product'=>$product, 'categories'=>AdminProductsController::categories()]);
    }

    /*
    Update the task
    */
    public function update()
    {
        if(!isset($_POST['category_id'])) {
            $_POST['category_id'] = 0;
        }
        App::get('database')->update('products', $_POST, $_POST['id']);
        return redirect('admin/products');
    }

    public function delete()
    {
        $id = $_GET['id'];
        App::get('database')->delete('products',$id);
        return redirect('admin/products');
    }

    public function create()
    {
        return view('admin/products/create', ['categories'=>AdminProductsController::categories()]);
    }

    public function insert()
    {
        App::get('database')->insert('products', $_POST);

        return redirect('admin/products');
    }

    /* Listing categories in index */
    
   static function categories(){
        $categories = [];
        
        foreach(App::get('database')->getAllWithFields('categories', ['id', 'name']) as $c){
           $categories[$c->id] = ucfirst(strtolower($c->name));
        }
        
        return $categories;
    }
}
