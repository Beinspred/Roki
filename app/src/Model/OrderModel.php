<?php
require_once __DIR__ . '/../DatabaseAdapter.php';
require_once __DIR__ . '/Model.php';
require_once __DIR__ . '/ProductModel.php';


class OrderModel extends Model
{
    protected $tableName = 'order';
    protected $relevantColumns = ['id', 'datum_order', 'counter'];
    protected $productModel;

    public function __construct()

    {   parent::__construct();
        $this->productModel = new ProductModel();
    }

    public function getAll()
    {

        $modelAll = $this->db->queryAll("SELECT COUNT(`order_item`.`id`) as `counter`, `order`.`id` as `order_id`, `order`.`datum_order`
            FROM `order_item`
            INNER JOIN `order` ON `order_item`.`order_id` = `order`.`id`
            GROUP BY `order`.`id`");

        return $modelAll;
    }

    public function getById($id)
    {
        $order = parent::getById($id);

        $orderItems = $this->db->queryAll("
SELECT `order_item`.`id`,`product`. `ime_proizvoda`,`product`. `opis_proizvoda`,`product`. `file`, `order_item`.`cijena`, `order_item`.`kolicina`, (`order_item`.`cijena`* `order_item`.`kolicina`) as `ukupno`
       
FROM `order_item`
         INNER JOIN `product` ON `order_item`.`product_id` = `product`. `id`
WHERE `order_item`.`order_id`={$id}");
        $order['items'] = $orderItems;
        return $order;
    }

    public function create($podaciPOST)
    {
        {
            $relevantColumns = ['name', 'email', 'telefon', 'address', 'city','napomene', 'id', 'ukupno'];
            $filterPost = [];
            foreach ($this->relevantColumns as $relevantColumn) {
                $filterPost[$relevantColumn] = $podaciPOST[$relevantColumn];
            }
            $this->productModel->getByIds();
            $modelCreate = $this->db->insert($this->tableName, $filterPost);
            return $modelCreate;
        }
    }
}