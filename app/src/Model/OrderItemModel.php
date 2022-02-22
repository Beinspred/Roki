<?php
require_once __DIR__.'/../DatabaseAdapter.php';
require_once __DIR__. '/Model.php';

class OrderItemModel extends Model
{
    protected $tableName = 'order_item';
    protected $relevantColumns = ['order_id','product_id','kolicina', 'cijena','ukupno'];
}