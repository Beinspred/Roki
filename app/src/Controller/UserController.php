<?php
require_once __DIR__ . '/../Model/UserModel.php';
require_once __DIR__. '/Controller.php';

class UserController extends Controller
{
    //properti,polje
    protected $indexViewName = 'user/index';
    protected $updateViewName = 'user/update';
    protected $updateRedirection = '/user/index';
    protected $deleteViewName = 'user/delete';
    protected $deleteRedirection = '/user/index';


    //metod
    public function __construct()
    {
        parent::__construct();
        $this->model = new UserModel();
    }

    public function getRegister()
    {

        return $this->render("user/register");
    }

    public function postRegister()
    {
        $controllerCreate = $this->model->create($_POST);
        header("Location: /user/login");
        return $controllerCreate;
    }

    public function getLogin(){
        return $this->render('user/login');
    }

    public function postLogin(){
            $controllerLogin = $this->model->login($_POST);

            header("Location: /user/index");
            return $controllerLogin;
    }







}
