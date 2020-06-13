<?php

require_once('Common_model.php');
class Mst_raw_material_model extends Common_model {
    
    public $table = 'mst_raw_material';
    public $primary_key = 'mrm_id';
    
    function __construct() {
        parent::__construct('mst_raw_material','mrm_id');
    }  
    
    public function fetch_join($cond = '', $select = '*', $limit = NULL, $offset = NULL) {
        if ($cond) {
            $where = ' 1 ' . $cond;
            $this->db->where($where, null, false);
        }

        $this->db->select($select);
        if ($limit != NULL) {
            $this->db->limit($limit, $offset);
        }

        $this->db->from($this->table . " as a"); 
        //$this->db->join("trn_shopping_bouget_header as b", "b.tsbh_id = a.tsbd_tsbh_id", 'LEFT');        
        $query = $this->db->get();
        return $query->result_array();
    }
   
    public function count_all_cond_join($cond = '') {
        if ($cond) {
            $where = ' 1 ' . $cond;
            $this->db->where($where, null, false);
        }
        $this->db->select('COUNT(*) AS cnt');
        $this->db->from($this->table . " as a");       
        //$this->db->join("trn_shopping_bouget_header as b", "b.tsbh_id = a.tsbd_tsbh_id", 'LEFT');
        $query = $this->db->get();
        $arrcnt = $query->result_array();
        return $arrcnt[0]['cnt'];
    }  
}


