<?php
require_once __DIR__ . '/../DatabaseAdapter.php';
require_once __DIR__ . '/Model.php';


class productModel extends Model
{
    protected $db;

    protected $tableName = 'product';
    protected $relevantColumns = ['ime_proizvoda', 'cijena', 'opis_proizvoda', 'slika', 'kolicina','category_id'];



    public function __construct()
    {
        $this->db = new DatabaseAdapter();
    }


}