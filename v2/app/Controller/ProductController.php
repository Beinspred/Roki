<?php
require_once __DIR__ . '/../Controller.php';
require_once __DIR__ . '/../Model/Product.php';

class ProductController extends Controller
{
    protected $model;
    protected $viewModule = 'product';

    public function __construct()
    {
        $this->model = new Product();
    }
}
