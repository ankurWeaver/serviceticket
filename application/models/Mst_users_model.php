<?php

require_once('Common_model.php');
class Mst_users_model extends Common_model {
    
    public $table = 'mst_users';
    public $primary_key = 'mu_id';
    
    function __construct() {
        parent::__construct('mst_users','mu_id');
    }  
}


