<?php

$routes->get('home', 'PagesController@home');
$routes->get('about', 'PagesController@about');
$routes->get('contact', 'PagesController@contact');

//login control routes 

$routes->get('login', 'AuthController@showLogin');
$routes->post('login', 'AuthController@loginUser');
$routes->get('logout', 'AuthController@logout');

//dashboard control routes

$routes->get('api/dashboard', 'DashboardController@index');
// $routes->post('dashboard', 'DashboardController@store');

$routes->get('admin/dashboard', 'AdminDashboardController@index', 'auth');
// $routes->get('admin/dashboard/new', 'AdminDashboardController@create');
// $routes->post('admin/dashboard/new', 'AdminDashboardController@insert');
// $routes->get('admin/dashboard/edit', 'AdminDashboardController@edit');
// $routes->post('admin/dashboard', 'AdminDashboardController@update');
// $routes->get('admin/dashboard/delete', 'AdminDashboardController@delete');

//User control routes

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

//Orders control routes

// $routes->get('api/orders', 'OrdersController@index');
// $routes->post('orders', 'OrdersController@store');

// $routes->get('admin/orders', 'AdminOrdersController@index');
// $routes->get('admin/orders/new', 'AdminOrdersController@create');
// $routes->post('admin/orders/new', 'AdminOrdersController@insert');
// $routes->get('admin/orders/edit', 'AdminOrdersController@edit');
// $routes->post('admin/orders', 'AdminOrdersController@update');
// $routes->get('admin/orders/delete', 'AdminOrdersController@delete');

// $routes->get('login', 'UsersController@storeLogin'); //changethis to post after login form submit

//// inner join for listing products in order
/// SELECT * FROM `orders` o inner join order_product p on o.id = p.order_id


/// when store order -> 
// first list all products from session
// foreach product mutliply product price with amount
// 2 products: apple:2.6 & peach:3
// order total = 0
//foreach products as pr
	// total += pr.price * pr.amount 
// when order is saved, store products in order_products table with 
// order id plus product id and amount  / as single record

