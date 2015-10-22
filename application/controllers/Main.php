<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
  created by: Leo Naga
 */
include_once('My_Controller.php');

class Main extends My_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('gen_model', 'gm');    
        $this->load->model('human', 'hm');
    }
    
    //put your code here
    public function index(){       
        //echo "test";        
        $this->data['sd'] = $this->hm->get_sd_tidak_mampu();
        $this->data['smp'] = $this->hm->get_smp_tidak_mampu();
        $this->data['all'] = $this->gm->get("hdrpinterin");
        //print_r($this->data['all']);exit;
        $this->data['backend_page'] = 'dashboard.php';
        $this->load->view('starter', $this->data);
    }   
    
    public function submit(){
        print_r($_POST);
    }
    
    public function login(){
        $user = $this->get_input("user");
        $pass = $this->get_input("password");
        
        $respon = array(
            "status" => "0",
            "message" => "User Tidak Ditemukan"
        );
        if($data = $this->gm->get("mstuser", array('VUSERNAME'=>$user, 'VPASSWORD' => $pass), TRUE, TRUE)){
            $respon['status'] = "1";
            $respon['message'] = "Login Sukses";
        } 
        $this->set_json($respon);
    }
        
}
