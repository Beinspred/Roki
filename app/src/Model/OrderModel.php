<?php
require_once __DIR__ . '/../DatabaseAdapter.php';
require_once __DIR__ . '/Model.php';


class OrderModel extends Model
{
    protected $tableName = 'order_item';
    protected $relevantColumns = ['datum_order', 'ukupno'];
//
//    public function getAll()
//    {
//        $modelAll = $this->db->selectOrder('order_item');
//        return $modelAll;
//    }
    public function selectOrder()
    {
        $selectquery = $this->conn->prepare("SELECT * FROM `order_item` INNER JOIN `order` ON `order_item.order_id`=`order.id` INNER JOIN `product` ON `product.id`=`order_item.order_id`");
        return $selectquery;

    }

}