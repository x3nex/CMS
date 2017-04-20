<?php

$routes->get('home', 'PagesController@home');
$routes->get('', 'PagesController@welcome');

//login control routes 

$routes->get('login', 'AuthController@showLogin');
$routes->post('login', 'AuthController@loginUser');
$routes->get('logout', 'AuthController@logout');

//dashboard control routes

$routes->get('api/dashboard', 'DashboardController@index');
// $routes->post('dashboard', 'DashboardController@store');

$routes->get('admin/dashboard', 'AdminDashboardController@index');
// $routes->get('admin/dashboard/new', 'AdminDashboardController@create');
// $routes->post('admin/dashboard/new', 'AdminDashboardController@insert');
// $routes->get('admin/dashboard/edit', 'AdminDashboardController@edit');
// $routes->post('admin/dashboard', 'AdminDashboardController@update');
// $routes->get('admin/dashboard/delete', 'AdminDashboardController@delete');

//User control routes
$routes->get('api/user', 'UsersController@getCurrentUser');
$routes->get('api/users', 'UsersController@index');
$routes->post('users', 'UsersController@store');

$routes->get('admin/users', 'AdminUsersController@index');
$routes->get('admin/users/new', 'AdminUsersController@create');
$routes->post('admin/users/new', 'AdminUsersController@insert');
$routes->get('admin/users/edit', 'AdminUsersController@edit');
$routes->post('admin/users', 'AdminUsersController@update');
$routes->get('admin/users/delete', 'AdminUsersController@delete');

//Products control routes

$routes->get('api/products', 'ProductsController@index');
$routes->post('products', 'ProductsController@store');

$routes->get('admin/products', 'AdminProductsController@index');
$routes->get('admin/products/new', 'AdminProductsController@create');
$routes->post('admin/products/new', 'AdminProductsController@insert');
$routes->get('admin/products/edit', 'AdminProductsController@edit');
$routes->post('admin/products', 'AdminProductsController@update');
$routes->get('admin/products/delete', 'AdminProductsController@delete');


//Categories control routes

$routes->get('api/categories', 'CategoriesController@index');
$routes->post('categories', 'CategoriesController@store');

$routes->get('admin/categories', 'AdminCategoriesController@index');
$routes->get('admin/categories/new', 'AdminCategoriesController@create');
$routes->post('admin/categories/new', 'AdminCategoriesController@insert');
$routes->get('admin/categories/edit', 'AdminCategoriesController@edit');
$routes->post('admin/categories', 'AdminCategoriesController@update');
$routes->get('admin/categories/delete', 'AdminCategoriesController@delete');

// $routes->get('login', 'UsersController@storeLogin'); //changethis to post after login form submit

//// inner join for listing products in order
/// SELECT * FROM `Categories` o inner join order_product p on o.id = p.order_id


/// when store order -> 
// first list all products from session
// foreach product mutliply product price with amount
// 2 products: apple:2.6 & peach:3
// order total = 0
//foreach products as pr
	// total += pr.price * pr.amount 
// when order is saved, store products in order_products table with 
// order id plus product id and amount  / as single record

