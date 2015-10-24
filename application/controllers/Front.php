<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
  created by: Leo Naga
 */
include_once('My_Controller.php');

class Front extends My_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('gen_model', 'gm');    
        $this->load->model('human', 'hm');
    }
    
    //put your code here
    public function index(){       
        //echo "test";        
        $this->load->view('frontpage', $this->data);
    }  
    
    
        
}
