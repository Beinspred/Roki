<?php
require_once __DIR__. '/../Model/CategoryModel.php';
require_once __DIR__. '/../Model/ProductModel.php';
require_once __DIR__. '/../Model/OrderModel.php';

require_once __DIR__ . '/Controller.php';

class IndexController extends Controller
{
    protected $indexViewName = 'index/index';
    private $categoryModel;
    private $productModel;
    private $orderModel;
     public function __construct()
     {
         $this->categoryModel = new CategoryModel();
         $this->productModel = new ProductModel();
         $this->orderModel = new OrderModel();
     }
     public function getIndex(){
         $categoryAll = $this->categoryModel->getAll();
         $productAll  = $this->productModel->getAll();
         return $this->render($this->indexViewName,  [
             'product' => $productAll,
             'category' => $categoryAll,
         ]);
     }
     public function getSeo($seo_slug){
         $category = $this->categoryModel->getBySeo($seo_slug);
         $products = $this->productModel->getByCatID($category['id']);
          return $this->render('index/plp',[
              'category' => $category,
              'products' => $products
          ] );
     }
     public function getPdp($seo_slug){
         $pdp = $this->productModel->getBySeo($seo_slug);
         return $this->render('index/pdp', $pdp);
     }
    public function getAddToCart($id){
         $cart = [];
         if(!isset($_SESSION['cart'])){
             $_SESSION['cart'] = [];
         }

        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]++;
        } else {
            $_SESSION['cart'][$id] = 1;
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        return $cart;
    }
    public function getPreview(){
         $preview = $this->productModel->getByIds();
         return $this->render('index/preview', $preview);
    }
    public function getCheckout(){
        return $this->render('index/checkout');
    }
    public function postCheckout(){
        $order = $this->orderModel->create($_POST);
        header("Location: /thankyou");
        return $order;
    }
    public function getThankyou(){
         return $this->render('/index/thankyou');
    }
}
