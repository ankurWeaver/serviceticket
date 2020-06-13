<?php

//Some basic oparetaion are available in this model
class Common_model extends CI_Model {
    
    protected $table;
    protected $primary_key;
    
    function __construct($tbl='', $id='id') {
        parent::__construct();
        $this->table = $tbl;
        $this->primary_key = $id;
    }
    
    
     public function setParams($tbl, $id) 
     {
        $this->table = $tbl;
        $this->primary_key = $id;        
     }
     
    public function fetch($cond = '', $select = '*', $limit = NULL, $offset = NULL) {
        if ($cond) {
            $where = ' 1 ' . $cond;
            $this->db->where($where, null, false);
        }
        $this->db->select($select);

        if ($limit != NULL) {
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
    

    public function add($data_field = array()) {
        $this->db->insert($this->table, $data_field);
        return $this->db->insert_id();
    }
    
    public function edit($data_field = array(), $id) {
        $re = $this->db->update($this->table, $data_field, array($this->primary_key => $id));
        return $re;
    }

    public function edit_cond($data_field = array(), $cond) {
        $where = ' 1 ' . $cond;
        $this->db->where($where, NULL, false);
        $re = $this->db->update($this->table, $data_field);
        return $re;
    }

    public function delete($id) {
        $this->db->where($this->primary_key, $id)->delete($this->table);
        return $this->db->affected_rows();
    }

    public function delete_cond($cond = '') {
        $where = ' 1 ' . $cond;
        $this->db->where($where, NULL, false);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function count_all() {
        return $this->db->count_all_results($this->table);
    }

    public function count_all_cond($cond = '') {
        if ($cond) {
            $where = ' 1 ' . $cond;
            $this->db->where($where, null, false);
        }
        $this->db->select('COUNT(*) AS cnt');
        $query = $this->db->get($this->table);
		
        $arrcnt = $query->result_array();
        return $arrcnt[0]['cnt'];
    }   
}


