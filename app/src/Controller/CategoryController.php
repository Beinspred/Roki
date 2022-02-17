<?php
require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../Model/categoryModel.php';


class CategoryController extends Controller
{
    protected $model;

    protected $indexViewName = 'category/index';
    protected $createViewName = 'category/create';
    protected $createRedirection = '/category/index';
    protected $updateViewName = 'category/update';
    protected $updateRedirection = '/category/index';
    protected $deleteViewName = 'category/delete';
    protected $deleteRedirection = '/category/index';

    public function __construct()
    {
        parent::__construct();
        $this->model = new categoryModel();
    }

    public function getCreate()
    {
        $category = $this->model->getAll();

        return $this->render($this->createViewName, [
            'category' => $category,
        ]);
    }
}