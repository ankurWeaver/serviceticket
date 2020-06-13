<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Explosion extends MY_Controller {

	
	public function index()
	{            
            $this->load->view('home', $this->data);
	}

	public function getDays() {
		
		    $this->load->view('explosion/getDays', $this->data);
	}
	
}
