<?php
require_once __DIR__ . '/../../Model/FileModel.php';
require_once __DIR__. '/../Controller.php';

class FileController extends Controller
{

    protected $indexViewName = 'file/index';
    protected $createViewName = 'file/create';
    protected $createRedirection = '/file/index';
    protected $updateViewName = 'file/update';
    protected $updateRedirection = '/file/index';
    protected $deleteViewName = 'file/delete';
    protected $deleteRedirection = '/file/index';


    public function __construct()
    {
        parent::__construct();
        $this->model= new FileModel();
    }

    public function postCreate()
    {
        $fileControlloer = $this->model->create($_FILES); // sranje nemas pojma sta prosledjujes
        header("Location: /file/index");
         // sranje jesmo li rekli da nakon redirekcije nista nema? ovo samo zbunjuje. u liniji gore se funkcija zavrsava
    }

    public function postUpdate($id)
    {
        $controllerUpdate = $this->model->update($_FILES, $id);
        header("Location: $this->updateRedirection");

        return $controllerUpdate;
    }


}