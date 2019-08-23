<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include "forTest.php";
//include "sendMail.php";
//include "checkDate.php";

class Home extends CI_Controller {

    public $pc;
    public $date;
    public $file;
    public $dateFromCheckDate;
    public $dateToMail;

    public function __construct()
	{
		    parent::__construct();
        $this->load->database();
        $this->pc = new forTest();
        $this->dateFromCheckDate = new checkDate();
        $this->dateToMail = $this->dateFromCheckDate->getYesterDay();
        //$this->file = new sendMail();
        //$this->date = new checkDate();
	}

	public function index()
	{
		    //$this->allproduct();
        $res = $this->load->model('home_model');
        $result = $this->home_model->get_all_product();
        $countPV = $this->pc->countPV();
        $countCVR = $this->pc->countCVR();
        $testing = $this->pc->testing();
        $aaa = array(
                'kkk' => $result
                );
        if($countPV !== "no file"){
            //print_r($countPV);
        }
        //print_r($countCVR);
        //print_r($testing);
        //$weekofday = $this->date->getYesterDay();
        //print_r($weekofday);
        //$this->file->makeFile();
        $this->load->view('home_view', $aaa);

	}

    public function signup(){

        $this->load->library('form_validation');

        $this->form_validation->set_rules('id','id','required');
        $this->form_validation->set_rules('pw','pw','required');
        $this->form_validation->set_rules('name','name','required');
        $this->form_validation->set_rules('email','email','required');
        $this->form_validation->set_rules('post','post','required');
        $this->form_validation->set_rules('address','address','required');
        $this->form_validation->set_rules('phone','phone','required');

        $email = $_POST['email'];
        //echo json_encode($email);

        if($this->form_validation->run() === false){

        $this->load->view('home_view');

        } else {

            $this->load->model('home_model');
            $result = $this->home_model->add(array(
                'id'=>$this->input->post('id'),
                'pw'=>$this->input->post('pw'),
                'name'=>$this->input->post('name'),
                'email'=>$this->input->post('email'),
                'post'=>$this->input->post('post'),
                'address'=>$this->input->post('address'),
                'phone'=>$this->input->post('phone'),
                'todoadd'=>$this->input->post('todoadd')
            ));

           if($result = 0){
               echo json_encode("ok");
           } else {
               echo json_encode("not ok");
           }
        }
          echo json_encode("'??'");
    }

    public function product() {
       $pnum = $_GET["pcode"];
       $this->load->model('home_model');
       $result = $this->home_model->get_one_product($pnum);
       $one_product = array('op' => $result);
       $this->load->view('check', $one_product);
    }


    public function getpowder(){
        $cname = $_GET["cname"];
        $this->load->model('home_model');
        $result = $this->home_model->get_one_category($cname);
        $show = array('kkk'=>$result);
        $this->load->view('product/showcategory', $show);
    }

}
