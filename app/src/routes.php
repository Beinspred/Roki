<?php

//Router::get('/user/login', 'UserController', 'getLogin');
//Router::post('/user/login', 'UserController', 'postLogin');
//Router::get('/user/register', 'UserController', 'getLogin');
//Router::post('/user/register', 'UserController', 'postLogin');
//User
Router::get('/user/register', 'UserController', 'getRegister');
Router::post('/user/register', 'UserController', 'postRegister');
Router::get('/user/login', 'UserController', 'getLogin');
Router::post('/user/login', 'UserController', 'postLogin');
Router::get('/user/index', 'UserController', 'getIndex');
Router::get('/user/update/{id}', 'UserController', 'getUpdate');
Router::post('/user/update/{id}', 'UserController', 'postUpdate');
Router::get('/user/update/{id}', 'UserController', 'getDelete');
Router::post('/user/update/{id}', 'UserController', 'postDelete');

//Product
Router::get('/product/index', 'ProductController', 'getIndex');
Router::get('/product/create', 'ProductController', 'getCreate');
Router::get('/product/create', 'ProductController', 'getCreate');
Router::get('/product/update/{id}', 'ProductController', 'getUpdate');
Router::post('/product/update/{id}', 'ProductController', 'postUpdate');
Router::get('/product/delete/{id}', 'ProductController', 'getDelete');
Router::post('/product/delete/{id}', 'ProductController', 'postDelete');

//Order
Router::get('/order/index', 'OrderController', 'getIndex');
Router::get('/order/show/{id}', 'OrderController', 'getShow');
Router::get('/order/create', 'OrderController', 'getCreate');
Router::get('/product/create', 'OrderController', 'getCreate');
Router::get('/order/create', 'OrderController', 'getCreate');
Router::get('/order/update/{id}', 'OrderController', 'getUpdate');
Router::post('/order/update/{id}', 'OrderController', 'postUpdate');
Router::get('/order/delete/{id}', 'OrderController', 'getDelete');
Router::post('/order/delete/{id}', 'OrderController', 'postDelete');


//File
Router::get('/file/index', 'FileController', 'getIndex');
Router::get('/file/create', 'FileController', 'getCreate');
Router::get('/file/create', 'FileController', 'getCreate');
Router::get('/file/update/{id}', 'FileController', 'getUpdate');
Router::post('/file/update/{id}', 'FileController', 'postUpdate');
Router::get('/file/delete/{id}', 'FileController', 'getDelete');
Router::post('/file/delete/{id}', 'FileController', 'postDelete');

//Category
Router::get('/category/index', 'CategoryController', 'getIndex');
Router::get('/category/create', 'CategoryController', 'getCreate');
Router::get('/category/create', 'CategoryController', 'getCreate');
Router::get('/category/update/{id}', 'CategoryController', 'getUpdate');
Router::post('/category/update/{id}', 'CategoryController', 'postUpdate');
Router::get('/category/delete/{id}', 'CategoryController', 'getDelete');
Router::post('/category/delete/{id}', 'CategoryController', 'postDelete');

//index
Router::get('/roki', 'IndexController', 'getIndex');
Router::get('/cat/{seo_slug}', 'IndexController', 'getSeo');
Router::get('/pdp/{seo_slug}', 'IndexController', 'getPdp');
Router::get('/addtocart/{id}', 'IndexController', 'getAddTocart');
Router::get('/preview', 'IndexController', 'getPreview');
Router::get('/checkout', 'IndexController', 'getCheckout');
Router::post('/checkout', 'IndexController', 'postCheckout');
Router::get('/thankyou', 'IndexController', 'getThankyou');






