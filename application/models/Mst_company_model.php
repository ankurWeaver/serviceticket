<?php

require_once('Common_model.php');
class Mst_company_model extends Common_model {
    
    public $table = 'mst_company';
    public $primary_key = 'mc_id';
    
    function __construct() {
        parent::__construct('mst_company','mc_id');
    }  
}


