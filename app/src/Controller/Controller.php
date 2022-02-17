<?php

abstract class Controller
{
    /**
     * @var Model
     */
    protected $model;
    protected $indexViewName;
    protected $createViewName;
    protected $createRedirection;
    protected $updateViewName;
    protected $updateRedirection;
    protected $deleteViewName;
    protected $deleteRedirection;

    public function __construct(){
        $this->check_session();
    }
     protected function check_session(){
         if($_SERVER['REQUEST_URI'] ==  "/user/login" OR $_SERVER['REQUEST_URI'] == "/user/register"){
                return;
                //return sam koristimo kad ne zelimo da nastavimo izvrsavanje dalji tok funkcije
         }
//         if (!array_key_exists('user', $_SESSION)){
//
//             header("Location: /user/login");
//         }
     }

    protected function render($viewName, $data = [])
    {
        ob_start();
        include_once '../src/View/' . $viewName . '.php';
        $content = ob_get_clean();
        return $content;

    }
    public function getIndex()
    {
        $indexAll = $this->model->getAll();
        return $this->render($this->indexViewName, $indexAll);

    }
    public function getCreate()
    {
        return $this->render($this->createViewName);
    }
    public function postCreate(){
        $controllerCreate = $this->model->create($_POST);
        header("Location: $this->createRedirection");
        return $controllerCreate;
    }

    public function getUpdate(int $id)
    {
        //$data ucitava aktuelne podatke

        $edit = $this->model->getById($id);
        if($edit == false){
            header("Location: $this->updateRedirection");
        }
        return $this->render($this->updateViewName, $edit);

    }

    public function postUpdate($id)
    {
        $controllerUpdate = $this->model->update($_POST, $id);
        header("Location: $this->updateRedirection");

        return $controllerUpdate;

    }

    public function getDelete($id)
    {
        return $this->render($this->deleteViewName, ['id' => $id]);
//umjesto view update stvljamo formu da li ste sigurni da zelite izbrisati nalog sa formicom nekom cao
    }

    public function postDelete($id){
        $productDelete = $this->model->delete($id);
        header("Location: $this->deleteRedirection");
        return $productDelete;
    }
}