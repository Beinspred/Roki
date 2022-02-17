<?php
require_once __DIR__ . '/../Model/OrderModel.php';
require_once __DIR__ . '/Controller.php';


class OrderController extends Controller
{
    protected $indexViewName = 'order/index';

    public function __construct()
    {
        parent::__construct();
        $this->model = new OrderModel();
    }
    public function getShow($id){
        $show = $this->model->getById($id);
        return $this->render('order/show', $show);
    }


    public function getCreate()
    {
        header("Location: /order/index");
    }

    public function postCreate()
    {
        header("Location: /order/index");
    }

    public function getUpdate($id)
    {
        header("Location: /order/index");

    }

    public function postUpdate($id)
    {
        header("Location: /order/index");

    }

    public function getDelete($id)
    {
        header("Location: /order/index");

    }

    public function postDelete($id)
    {
        header("Location: /order/index");

    }


}