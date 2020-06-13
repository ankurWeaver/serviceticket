<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function __construct(){
        parent::__construct();        
        $this->load->model('mst_users_model');
        
        
    }
    function index(){       
	$this->getCommonFiles();        
        //t($this->data['sidebar'],1);
        //t($this->data,1);
        $this->load->view('common/dashboard', $this->data);
    }
    
	
	
}
