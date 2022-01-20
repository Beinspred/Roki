<?php
require_once __DIR__ . '/../DatabaseAdapter.php';
require_once __DIR__ . '/Model.php';


class UserModel extends Model
{
    protected $db;
    protected $tableName = 'user';
    protected $relevantColumns = ['name', 'email', 'password'];


    public function __construct()
    {
        $this->db = new DatabaseAdapter;

    }

    public function login($podaciPost)
    {
        $relevantLogin = ['name', 'password'];
        $filterLogin = [];
        foreach ($relevantLogin as $relevantsLogin) {
            $filterLogin[$relevantsLogin] = $podaciPost[$relevantsLogin];
        }
        $modelLogin = $this->db->login('user', $filterLogin['name'], $filterLogin['password']);
        $_SESSION['user'] = $modelLogin;
        return $modelLogin;

    }


}
