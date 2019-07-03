<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {


    public function __construct()
	{
		parent::__construct();
        $this->load->database();
        $this->load->helper('form');
	}

    public function gologin(){
        $auth_data = array(
            'id' => $this->input->post('mid', true),
            'pw' => $this->input->post('mpw', true)
        );

        $this->load->model('Home_model');
        $res = $this->Home_model->logincheck($auth_data);

        //echo json_encode($res);

        if($res){
            $loginsession = array(
                'username' => $res->name,
                'id' => $res->id,
                'logged_in' => true
            );

            $this->session->set_userdata($loginsession);

            exit;
        } else {
           // echo json_encode('fail');
        }

    }

     public function logout(){

        $this->session->sess_destroy();

    }

    public function mypageview(){
        $this->load->view('member/info');
    }

}
