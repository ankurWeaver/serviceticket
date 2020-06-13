<?php

require_once('Common_model.php');
class Trn_raw_material_equip_model extends Common_model {
    
    public $table = 'trn_raw_material_equip';
    public $primary_key = 'trme_id';
    
    function __construct() {
        parent::__construct('trn_raw_material_equip','trme_id');
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
        $this->db->join("mst_service_catalogue as b", "b.msc_id = a.trme_tsbd_id", 'LEFT');
        $this->db->join("mst_raw_material as c", "c.mrm_id = a.trme_mrm_id", 'LEFT');
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
        $this->db->join("mst_service_catalogue as b", "b.msc_id = a.trme_tsbd_id", 'LEFT');
        $this->db->join("mst_raw_material as c", "c.mrm_id = a.trme_mrm_id", 'LEFT');
        $query = $this->db->get();
        $arrcnt = $query->result_array();
        return $arrcnt[0]['cnt'];
    }  
}


