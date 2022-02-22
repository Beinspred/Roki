<?php
require_once __DIR__ . '/../DatabaseAdapter.php';
require_once __DIR__ . '/Model.php';
require_once __DIR__ . '/ProductModel.php';
require_once __DIR__ . '/OrderItemModel.php';


class OrderModel extends Model
{
    protected $tableName = 'order';
    protected $relevantColumns = ['id', 'datum_order', 'counter'];
    protected $productModel;
    protected $orderitemModel;

    public function __construct()

    {
        parent::__construct();
        $this->productModel = new ProductModel();
        $this->orderitemModel = new OrderItemModel();
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
            SELECT `order_item`.`id`,`product`. `ime_proizvoda`,`product`. `opis_proizvoda`, `order_item`.`cijena`, `order_item`.`kolicina`,
              (`order_item`.`cijena`* `order_item`.`kolicina`) as `ukupno`
            FROM `order_item`
            INNER JOIN `product` ON `order_item`.`product_id` = `product`. `id`
            WHERE `order_item`.`order_id`={$id}");
        $order['items'] = $orderItems;
        return $order;
    }

    public function create($podaciPOST)
    {
        $relevantColumns = ['name', 'email', 'telefon', 'address', 'city', 'napomene', 'ukupno'];
        $filterPost = [];
        foreach ($relevantColumns as $relevantColumn) {
            $filterPost[$relevantColumn] = $podaciPOST[$relevantColumn];
        }
        $order_items = $this->productModel->getByIds();
        $total = 0;
        foreach ($order_items as $order_item) {
            $total += $order_item['ukupno'];
        }
        $filterPost['ukupno'] = $total;
        $orderId = $this->db->insert($this->tableName, $filterPost);
        foreach ($order_items as &$order_item) {
            $order_item['product_id'] = $order_item['id'];
            $order_item['order_id'] = $orderId;
            $orders = $this->orderitemModel->create($order_item);
        }
        unset($_SESSION['cart']);
        return $orderId;
    }
}
