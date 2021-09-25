<?php
require_once __DIR__ . '/View.php';

abstract class Controller
{
    /**
     * @var Model
     */
    protected $model;
    protected $viewModule = 'index';

    public function index()
    {
        $items = [];

        if (isset($this->model)) {
            $items = $this->model->all();
        }

        return new View("{$this->viewModule}/index", ['items' => $items]);
    }

    public function getCreate()
    {

    }

    public function postCreate()
    {

    }

    public function getUpdate()
    {

    }

    public function postUpdate()
    {

    }

    public function postDelete()
    {

    }
}
