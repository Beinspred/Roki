<?php
require_once __DIR__ . '/../Model/UserModel.php';
require_once __DIR__. '/Controller.php';

class UserController extends Controller
{
    //properti,polje
    protected $indexViewName = 'users/index';
    protected $updateViewName = 'users/update';
    protected $updateRedirection = '/user/index';
    protected $deleteViewName = 'users/delete';
    protected $deleteRedirection = '/user/index';


    //metod
    public function __construct()
    {
        parent::__construct();
        $this->model = new UserModel();
    }

    public function getRegister()
    {

        return $this->render("users/register");
    }

    public function postRegister()
    {

//       $controllerObject = new $controllerName()--UserController;
        $controllerCreate = $this->model->create($_POST);
        header("Location: /user/login");
        return $controllerCreate;

    }
    public function getLogin(){
        return $this->render('users/login');
    }
    public function postLogin(){
            $controllerLogin = $this->model->login($_POST);

            header("Location: /user/index");
            return $controllerLogin;
    }







}
