<?php
namespace App\Controllers;
use \App\Core\App;
use App\Core\AuthGuard;


AuthController::checkLogin();

class AdminCategoriesController {

    public function index()
    {
        $categories = App::get('database')->getAll('categories', " ORDER BY name");
        $limitedProducts = App::get('database')->getAllWithFields('categories', ['id']);
        return view('admin/categories/index', compact('categories', 'limitedProducts'));
        //compact('products')); //['products' => $products]
    }

    /*
     * Displays edit form
     */
    public function edit()
    {

        $id = (int)$_GET['id'];
        $product = App::get('database')->find('categories', $id);

        return view('admin/categories/edit', ['category'=>$product, 'categories'=>AdminProductsController::categories()]);
    }

    /*
    Update the task
    */
    public function update()
    {
     
        App::get('database')->update('categories', $_POST, $_POST['id']);
        return redirect('admin/categories');
    }

    public function delete()
    {
        $id = $_GET['id'];
        App::get('database')->delete('categories',$id);
        return redirect('admin/categories');
    }

    public function create()
    {
        return view('admin/categories/create', ['categories'=>AdminProductsController::categories()]);
    }

    /* Listing categories in index */
    
   static function categories(){
        $categories = [];
        
        foreach(App::get('database')->getAllWithFields('categories', ['id', 'name']) as $c){
           $categories[$c->id] = ucfirst(strtolower($c->name));
        }
        
        return $categories;
    }
        public function insert()
    {
        App::get('database')->insert('categories', $_POST);

        return redirect('admin/categories');
    }
}
