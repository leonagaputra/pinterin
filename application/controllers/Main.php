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
        $this->folder_upload = "img/human/";
        $this->load->model('gen_model', 'gm');    
        $this->load->model('human', 'hm');
    }
    
    //put your code here
    public function index(){  
        $this->_cek_user_login();
        //echo "test";        
        $this->data['sd'] = $this->hm->get_sd_tidak_mampu();
        $this->data['smp'] = $this->hm->get_smp_tidak_mampu();
        $this->data['all'] = $this->gm->get("hdrpinterin");
        $year = date("Y");
        //$this->data['user'] = $this->hm->get_user($year);
        $this->data['user'] = $this->get_all_year_user($year, $this->hm->get_user($year), $this->hm->get_transaction($year));
        $this->data['community'] = $this->get_all_year_community($year, $this->gm->get("mstcommunity"), $this->hm->get_community_transaction($year));
        $this->data['color'] = $this->gm->get("dtlsetting", array('VITEMCODE'=> 'VCOLOR'));
        //print_r($this->data['community']);exit;
        //$this->data['community'] =NULL;
        //print_r($this->data['user']);exit;
        $this->data['backend_page'] = 'dashboard.php';
        $this->data['nama'] = $this->session->userdata('VFIRSTNAME');
        $this->data['join'] = date("M. Y", strtotime($this->session->userdata('DCREA')));
        $this->load->view('starter', $this->data);
    }  
    
    public function follow_up(){
        $this->data['backend_page'] = 'follow_up.php';
        $this->load->view('starter', $this->data);
    }
    
    function get_all_year_community($year, $community, $community_transaction){
        //print_r($community);exit;
        $arrays = array();
        $tmp = array();
        //$flag = FALSE;
        $return = array();
        foreach($community_transaction as $obj){      
            if(empty($tmp)){
                foreach($community as $obj1){
                    $tmp1 = (object)array(
                        "BULAN" => $obj->BULAN,
                        "COM_ID"=> $obj1->ID,
                        "VNAMA" => $obj1->VNAMA,
                        "JUMLAH" => 0
                    );
                    if($obj->COM_ID == $obj1->ID){
                        $tmp1->JUMLAH = $obj->JUMLAH;
                    }
                    array_push($tmp, $tmp1);
                    array_push($arrays, $tmp1);
                    
                }
                //print_r($arrays);exit;
            } else {
                //print_r($tmp);exit;
                if($obj->BULAN != $tmp[0]->BULAN){
                    $tmp = array();
                    foreach($community as $obj1){
                        $tmp1 = (object)array(
                            "BULAN" => $obj->BULAN,
                            "COM_ID"=> $obj1->ID,
                            "VNAMA" => $obj1->VNAMA,
                            "JUMLAH" => 0
                        );
                        if($obj->COM_ID == $obj1->ID){
                            $tmp1->JUMLAH = $obj->JUMLAH;
                        }
                        array_push($tmp, $tmp1);
                        array_push($arrays, $tmp1);
                    }
                    //print_r($arrays);exit;
                } else {
                    foreach($arrays as $arr){
                        if(($arr->BULAN == $obj->BULAN) && ($arr->COM_ID == $obj->COM_ID)){
                            $arr->JUMLAH += $obj->JUMLAH;
                        }
                    }
                }                
            }            
        }
        //print_r($arrays);exit;
        foreach($community as $obj){
            $data = (object)array(
                'COM_ID' => $obj->ID,
                'COM' => $obj->VNAMA,
                'MONTHS' => array()
            );
            for($i=0; $i<12; $i++){
                $bulan = (($i+1)<10)? "0".($i+1) : ($i+1);    
                $string = $year."-".$bulan;
                $bul_array = (object)array(
                    "BULAN" => $string,
                    "JUMLAH" => 0
                );
                foreach($arrays as $arr){
                    if($string == $arr->BULAN && $obj->ID == $arr->COM_ID){
                        $bul_array->JUMLAH = $arr->JUMLAH;
                    }
                }
                array_push($data->MONTHS, $bul_array);
            }
            //print_r($data);exit;
            array_push($return, $data);
        }
       //print_r($return);exit;
        return $return;
    }
    
    function get_all_year_user($year, $datas_registrasi, $datas_transaction){
        $result = array();
        $jml_ytd = 0;
        for($i = 0; $i < 12; $i++){
            $datax = (object)array(
                "BULAN" => ($i+1),
                "JUMLAH" => 0,
                "TRX"=>0,
                "JML_YTD" => 0
            );
            foreach($datas_registrasi as $data){
                $bulan = (($i+1)<10)? "0".($i+1) : ($i+1);
                $string = $year."-".$bulan;
                $datax->BULAN = $string;
                if($string == $data->BULAN){
                    $datax->JUMLAH = $data->JUMLAH;
                    $jml_ytd += $datax->JUMLAH;
                    $datax->JML_YTD = $jml_ytd;
                }
            }
            foreach($datas_transaction as $data){
                $bulan = (($i+1)<10)? "0".($i+1) : ($i+1);
                $string = $year."-".$bulan;
                if($string == $data->BULAN){
                    $datax->TRX = $data->JUMLAH;                    
                }
            }
            array_push($result, $datax);
        }
        //print_r($result);exit;
        return $result;        ;
    }
    
    public function testform(){
        $this->load->view('testform', $this->data);
    }        
    
    public function testsend(){
        print_r($_POST);
        print_r($_FILES);exit;
    }
    
    public function send_data(){           
//        print_r($_POST);exit;
//        print_r($_FILES);exit;
        $tgl_lahir = NULL;
        if($usia = $this->get_input("usia")){
            $year = date("Y");
            $year -= $usia;
            $tgl_lahir = $year."-01-01";
        }
        $dcrea = date("Y-m-d H:i:s");
        
        $insert = array(
            'VFIRSTNAME' => $this->get_input("nama"),
            'DLAHIR' => $tgl_lahir,
            'VJNSKLMN' => $this->get_input("kelamin"),
            'VFLSEKOLAH' => $this->get_input('masihsekolah'),
            'VPENDIDIKAN' => $this->get_input('pendidikan'),
            'VKELAS' => $this->get_input('kelas'),
            'VLANJUTSKL' => $this->get_input('lanjutsekolah'),
            'VFLPEKERJAAN' => $this->get_input('pekerjaan'),
            'VLONGITUDE' => $this->get_input('longitude'),
            'VLATITUDE' => $this->get_input('latitude'),
            'VCREA' => $this->get_input('user_id'),
            'VFLORTU' => $this->get_input('ortu'),
            'DCREA' => $dcrea
        );
        $respon = array(
            "status" => "0",
            "message" => "Input Gagal"
        );
        //$this->set_json($insert);
        //exit;
        
        if($human_id = $this->gm->insert('msthuman', $insert)){
            $insert2 = array(
                'MSTHUMAN_ID' => $human_id,
                'VLONGITUDE' => $this->get_input('longitude'),
                'VLATITUDE' => $this->get_input('latitude'),
                'VCREA' => 'SYSTEM',
                'DCREA' => $dcrea
            );   
            if($hdrpinterin_id = $this->gm->insert('hdrpinterin', $insert2)){
                $respon = array(
                    "status" => "1",
                    "message" => "Input Sukses"
                );
            }
            //print_r($_FILES);exit;
            if (!empty($_FILES)) {
                if($_FILES["foto"]["name"]){
                    $name = explode(".", $_FILES["foto"]["name"]);
                    $ext = strtolower($name[count($name)-1]);
                    $image_ext = array("jpg", "png", "jpeg");
                    if(in_array($ext, $image_ext)){
                        if ($_FILES["foto"]["tmp_name"]) {
                            //move to folder
                            $newfilename = $this->folder_upload.$human_id.".".$ext;
                            move_uploaded_file($_FILES["foto"]["tmp_name"], $newfilename);
                            $this->gm->update("msthuman",array("VEXTENSION"=>$ext), $human_id);
                        }
                    } else {
                        $respon = array(
                            "status" => "2",
                            "message" => "Input Sukses, Upload Data Gagal"
                        );
                    }     
                }                    
            }
        }        
        $this->set_json($respon);
        
    }        
    
    public function test(){           
//        
    }
    
    /*public function test(){
        $respon = array(
            "status" => "0",
            "message" => "Input Gagal"
        );
        $this->set_json($respon);
        exit;
    }*/
    
    public function login(){
        $user = $this->get_input("user");
        $pass = $this->get_input("password");
        //$user = "leo.n.putra@astra-honda.com";
        //$pass = "123456";
        
        $respon = array(
            "status" => "0",
            "message" => "User Tidak Ditemukan",
            "user_id" => "0"
        );
        if($data = $this->gm->get("mstuser", array('VUSERNAME'=>$user, 'VPASSWORD' => $pass), TRUE)){
            
            //if($data->cnt == 1){
                $respon['status'] = "1";
                $respon['message'] = "Login Sukses";
                $respon['user_id'] = $data->ID;
            //}            
        } 
        $this->set_json($respon);
    }
    
    public function do_login(){
        $user = $this->get_input("email");
        $password = $this->get_input("password");
        if ($result = $this->gm->get("mstuser", array('VUSERNAME' => $user, 'VPASSWORD' => $password), TRUE)) {
            //print_r($result);exit;
            $this->data['username'] = strtoupper($user);
            $this->session->set_userdata((array) $result);
            header('location:' . $this->data['base_url'] . 'index.php/main/index');
        } else {
            //echo "test";exit;
            header('location:' . $this->data['base_url'] . 'index.php/front/');
        }
    }
    
    public function get_kota(){
        /*
         * SELECT KEL.VDEPDAGKOTA, KOTA.VNAMA AS NAMAKOTA, KEL.VDEPDAGKEC, KEC.VNAMA AS NAMAKEC, KEL.VDEPDAGKEL,KEL.VNAMA
FROM mstkelurahan KEL, MSTKOTA KOTA, MSTKECAMATAN KEC
WHERE KEL.VDEPDAGKOTA = KOTA.VDEPDAGKOTA
AND KEC.VDEPDAGKEC = KEL.VDEPDAGKEC;
         */
    }
    
    private function _cek_user_login() {
        //echo "test". $this->session->userdata('username')." lalala";exit;
        //print_r($$this->session->userdata('VUSERNAME'));
        if (!$this->session->userdata('VUSERNAME')) {
            //echo "test2";exit;            
            header('location:' . $this->data['base_url'] . "index.php/front/");
        }
        //echo $this->session->userdata('VEMAIL');
        //exit;
        $this->data['username'] = strtoupper($this->session->userdata('VUSERNAME'));
        //echo "test22". $this->session->userdata('username')." lalala";exit;
    }
    
    function logout() {
        $this->session->sess_destroy();
        header('location:' . $this->data['base_url'] . 'index.php/front/');
    }
        
}
