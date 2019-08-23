<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {


    public function __construct()
	{
		parent::__construct();
        $this->load->database();
        $this->load->library('cart');
	}

    public function index()
	{
    
		$this->load->view('product/order');
	}

    public function order_check(){
        $data['controller'] = $this;

        $items = $_GET["ITEMS"];

        if($items){
            $items = explode("IX", $items);
        }

        $data['items'] = $items;

        $this->load->view('product/order', $data);

    }

    public function getiteminfo($item_code){

        $this->load->model('Home_model');
        $itemrow = $this->Home_model->getItemRow($item_code);
        //print_r($itemrow);

        return $itemrow;
    }

    public function payment(){

        $ITEMS = $_POST["ITEMS"];
        $pname = $_POST["pname"];
        $ordername = $_POST["ordername"];
        $orderphone = $_POST["orderphone"];
        $orderemail = $_POST["orderemail"];
        $orderpost = $_POST["orderpost"];
        $add = $_POST["add"];
        $orderaddress = $_POST["orderaddress"];
        $ordermessage = $_POST["ordermessage"];
        $payck = $_POST["payck"];


        $data = array(
            'ITEMS' => $ITEMS,
            'pname' => $pname,
            'ordername' => $ordername,
            'orderemail' => $orderemail,
            'orderphone' => $orderphone,
            'orderpost' => $orderpost,
            'add' => $add,
            'orderaddress' => $orderaddress,
            'ordermessage' => $ordermessage,
            'payck' => $payck
        );


        $this->load->model('Home_model');

        $itemrow = $this->Home_model->insertorder($data);

        $this->order_delete();

        $aaa = array('kkk' => $itemrow);

        $this->load->view('public/orderdone', $aaa);


    }

    public function rightorder_check(){

        $id = $_GET["id"];

        $this->load->model('Home_model');

        $itemrow = $this->Home_model->getBuyItem($id);

        $aaa = array('kkk' => $itemrow);

        $this->load->view('product/right_order', $aaa);

    }

    public function right_payment(){

        $productid = $_POST["pc"];
        $productpn = $_POST["orderproductname"];
        $productpp = $_POST["orderproduct_price"];
        $productpqty = $_POST["orderproduct_qty"];
        $productptotal = $_POST["orderproduct_totalprice"];
        $ordername = $_POST["ordername"];
        $orderphone = $_POST["orderphone"];
        $orderemail = $_POST["orderemail"];
        $orderpost = $_POST["orderpost"];
        $add = $_POST["add"];
        $orderaddress = $_POST["orderaddress"];
        $ordermessage = $_POST["ordermessage"];
        $payck = $_POST["payck"];


        $data = array(
            'pc' => $productid,
            'pn' => $productpn,
            'pp' => $productpp,
            'pqty' => $productpqty,
            'ptotal' => $productptotal,
            'ordername' => $ordername,
            'orderemail' => $orderemail,
            'orderphone' => $orderphone,
            'orderpost' => $orderpost,
            'add' => $add,
            'orderaddress' => $orderaddress,
            'ordermessage' => $ordermessage,
            'payck' => $payck
        );

        $this->load->model('Home_model');
        $itemrow = $this->Home_model->insertoneorder($data);

        $aaa = array('kkk' => $itemrow);

        $this->load->view('public/orderdone', $aaa);
    }

    public function order_delete(){
        $this->cart->destroy();
    }

}
