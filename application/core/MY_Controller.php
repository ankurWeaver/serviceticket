<?php

class MY_Controller extends CI_Controller {    
   
    public $data = array();
    function __construct() {
        parent::__construct();
        
        $base_url = $this->config->item('base_url');
        $this->data['base_url'] = $base_url;
        //
        $this->data['controller_name'] = $this->uri->segment(2) . '/';
        $this->data['method_name'] = $this->uri->segment(3);
        $this->data['css_path'] = $base_url . $this->config->item('css_path');
        $this->data['js_path'] = $base_url . $this->config->item('js_path');
        $this->data['images_path'] = $base_url . $this->config->item('images_path');
        
        date_default_timezone_set( 'Asia/Kolkata' ); 
    }
    
    function getCommonFiles() {  
        $this->data['script'] = $this->load->view('shared/script', $this->data, TRUE);
    }
    
}

