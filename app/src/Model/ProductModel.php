<?php
require_once __DIR__ . '/../DatabaseAdapter.php';
require_once __DIR__ . '/Model.php';


class ProductModel extends Model
{
    protected $db;
    protected $tableName = 'product';
    protected $relevantColumns = ['ime_proizvoda', 'cijena', 'opis_proizvoda', 'file', 'kolicina', 'category_id'];

    public function __construct()
    {
        $this->db = new DatabaseAdapter();
    }

    public function getByCatID($categoryID)
    {
        $products = $this->db->queryAll("SELECT * FROM `{$this->tableName}` WHERE category_id='{$categoryID}'");
        return $products;
    }

    public function getBySeo($seo_slug)
    {
        $seo = $this->db->queryOne("SELECT * FROM `{$this->tableName}` WHERE seo_slug='{$seo_slug}'");
        return $seo;

    }

    public function getByIds()
    {
        if (!isset($_SESSION['cart']) || (empty($_SESSION['cart']))) {
            return [];
        }
        $product_ids = array_keys($_SESSION['cart']);
        $product_ids_string = implode(",", $product_ids);
        $products = $this->db->queryAll("SELECT id,ime_proizvoda,cijena FROM `{$this->tableName}` WHERE id IN ({$product_ids_string})");

        foreach ($products as $key => &$product){
            $product['kolicina'] = $_SESSION['cart'][$product['id']];
            $product['ukupno'] = $product['cijena'] * $product['kolicina'];
        }
        return $products;
    }
}
