<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Human extends CI_Model{

    var $table = "msthuman";

    public function __construct()
    {
        parent::__construct();
    }

    public function get_sd_tidak_mampu()
    {        
        /*$this->db->select("floor(DATEDIFF(CURRENT_DATE, DLAHIR)/365) AS USIA, count(floor(DATEDIFF(CURRENT_DATE, DLAHIR)/365)) as JML");
        $this->db->from("msthuman");
        $this->db->where("floor(DATEDIFF(CURRENT_DATE, DLAHIR)/365) <", "12");
        $this->db->group_by("floor(DATEDIFF(CURRENT_DATE, DLAHIR)/365)");*/
        $sql = "SELECT floor(DATEDIFF(CURRENT_DATE, DLAHIR)/365) AS USIA, count(floor(DATEDIFF(CURRENT_DATE, DLAHIR)/365)) as JML
            FROM msthuman
            WHERE floor(DATEDIFF(CURRENT_DATE, DLAHIR)/365) < 12
            group by floor(DATEDIFF(CURRENT_DATE, DLAHIR)/365)";
        //if($query = $this->db->get())
        if($query = $this->db->query($sql))
        {
            //echo $this->db->last_query();exit;
            if($query->num_rows() > 0)
            {                
                return $query->result();
            }
        }
        return FALSE;
    } 
    
    public function get_smp_tidak_mampu()
    {        
        /*$this->db->select("floor(DATEDIFF(CURRENT_DATE, DLAHIR)/365) AS USIA, count(floor(DATEDIFF(CURRENT_DATE, DLAHIR)/365)) as JML");
        $this->db->from("msthuman");
        $this->db->where("floor(DATEDIFF(CURRENT_DATE, DLAHIR)/365) <", "12");
        $this->db->group_by("floor(DATEDIFF(CURRENT_DATE, DLAHIR)/365)");*/
        $sql = "SELECT floor(DATEDIFF(CURRENT_DATE, DLAHIR)/365) AS USIA, count(floor(DATEDIFF(CURRENT_DATE, DLAHIR)/365)) as JML
            FROM msthuman
            WHERE floor(DATEDIFF(CURRENT_DATE, DLAHIR)/365) < 15 AND floor(DATEDIFF(CURRENT_DATE, DLAHIR)/365) > 11
            group by floor(DATEDIFF(CURRENT_DATE, DLAHIR)/365)";
        //if($query = $this->db->get())
        if($query = $this->db->query($sql))
        {
            //echo $this->db->last_query();exit;
            if($query->num_rows() > 0)
            {                
                return $query->result();
            }
        }
        return FALSE;
    } 

    public function update($id, $data, $table = NULL, $dtl_id = NULL, $hdrfield = NULL, $dtlfield = NULL)
    {
        if($hdrfield == NULL)
            $this->db->where('HDRPAGES_ID', $id);
        else
            $this->db->where($hdrfield, $id);
        $table2 = $table == NULL ? $this->table : $table;
        if($dtl_id != NULL) {
            if($dtlfield == NULL)
                $this->db->where('DTLPAGES_ID', $dtl_id);
            else 
                $this->db->where($dtlfield, $dtl_id);
        }
        $this->db->update($table2, $data);
        return $id;
    }
    
    function insert($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    
    function update_data($table, $data, $id, $where = NULL){
        if($where){
            $this->db->where($where);
        }
        else {
            $this->db->where("ID", $id);        
        }
        $this->db->update($table, $data);
    }
        

}