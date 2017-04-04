<?php

use App\Core\App;

if(!isset($_SESSION)){
    session_start();
}

App::bind('config', require 'config.php');
// App::bind('fileRoot', $_SERVER['DOCUMENT_ROOT']);
// App::bind('siteRoot', 'http://'.$_SERVER["SERVER_NAME"].':8000');


App::bind('database',  new QueryBuilder(
    Connection::make(App::get('config')['database'])
));

function view($name, $data = []) {

    extract($data);

    return require "app/views/{$name}.view.php";
}

function redirect($url) {
    header("Location: /{$url}");
}

function dd($printedResult){
	 echo "<pre>";
        print_r($printedResult);
        exit();
}