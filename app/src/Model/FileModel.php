<?php
require_once __DIR__ . '/../DatabaseAdapter.php';
require_once __DIR__ . '/Model.php';

class FileModel extends Model
{
    protected $db;
    protected $tableName = 'file';
    protected $relevantColumns = ['id','name', 'type','size'];

    public function __construct()
    {
        $this->db = new DatabaseAdapter();
    }

    public function create($files) // sranje sto imenujes $podaciPOST ako prosledjujes $_FILES iz kontrolera ovamo
    {

//        $file = ''; // sranje ova varijabla se nigdje ne koristi
        if (isset($files['file'])) { // sranje sto koristis $_FILES kad ti je ova $podaciPOST prosledjeni $_FILES iz kontrolera
            $file =  $files['file']['name'];
            $tempname = $files['file']['tmp_name'];
            $file_destination = __DIR__ . '/../../public/file/' . $file;
            $this->db->insert($this->tableName, $files);
            if (!move_uploaded_file($tempname, $file_destination)) {
                error_log("Error"); // sranje error logovanje nismo jos radili
                header("Location: /file/index/"); // sranje redirekcija i render smo dogovorili da se radi u kontrolerima
            }

            // sranje nisi dampom provjerila uopsta $podaciPOST da li se poklapa sa strukturom baze
            return parent::create($files['file']) ;

        }


    }

}


