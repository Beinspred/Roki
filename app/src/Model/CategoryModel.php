<?php
require_once __DIR__.'/../DatabaseAdapter.php';
require_once __DIR__.'/Model.php';

class
categoryModel extends Model
{
    protected $db;
    protected $tableName = 'category';
    protected $relevantColumns = ['name','parent_id', 'seo_slug'];

    public function __construct()
    {
        $this->db = new DatabaseAdapter();
    }

    public function create($podaciPOST)
    {
        if($podaciPOST['parent_id'] == 0){
            $podaciPOST['parent_id'] = NULL;

        }
        return parent::create($podaciPOST);


    }
    public function getBySeo($seo_slug)
    {
        $seo = $this->db->queryOne("SELECT * FROM `{$this->tableName}` WHERE seo_slug='{$seo_slug}'");
        return $seo;

    }


}