<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cwd = getcwd();
require_once($cwd . '/application/integration/RawMaterial.php');

class RawmaterialMaster extends MY_Controller {

    public function __construct() {
       parent::__construct();
       
    }
    public function index()
    {
        $rawMat = new RawMaterial();
        $ret = $rawMat->getMaterialsListing(); 
        $this->data['records'] =  [];
        $this->data['records']  =  json_decode(json_encode($ret), true);
        
        //echo "<pre>";
        //print_r($output);
        
       
        $this->load->view('master/material/material',$this->data);
    }
    public function add()
    {
        
        if ($this->input->post('submit')) {
            $mrm_raw_material_name = $this->input->post('mrm_raw_material_name');
            $mrm_desc = $this->input->post('mrm_desc');
            $mrm_type = $this->input->post('mrm_type');
            $mrm_unit = $this->input->post('mrm_unit');
            //
            $params = array(
                'mrm_raw_material_name' => $mrm_raw_material_name, 
                'mrm_desc' => $mrm_desc, 
                'mrm_type' => $mrm_type, 
                'mrm_unit' => $mrm_unit     			
            );
            
            $rawMat = new RawMaterial();
            $ret = $rawMat->addMaterials($params);           
            redirect($this->data['base_url'].'rawmaterialmaster');
            
        } else {
            $this->load->view('master/material/material-add',$this->data);
        }
    }
    
    public function edit($id=0)
    {
        
        if ($this->input->post('submit')) {
            $mrm_raw_material_name = $this->input->post('mrm_raw_material_name');
            $mrm_desc = $this->input->post('mrm_desc');
            $mrm_type = $this->input->post('mrm_type');
            $mrm_unit = $this->input->post('mrm_unit');
            //
            $params = array(
                'mrm_raw_material_name' => $mrm_raw_material_name, 
                'mrm_desc' => $mrm_desc, 
                'mrm_type' => $mrm_type, 
                'mrm_unit' => $mrm_unit     			
            );
            //echo "<pre>";
            //print_r($params);die;
            $rawMat = new RawMaterial();
            $ret = $rawMat->editMaterials($params,$id);           
            redirect($this->data['base_url'].'rawmaterialmaster');
            
        } else {
            
            $rawMat = new RawMaterial();
            $ret = $rawMat->getMaterialsById($id);            
            $this->data['row']  =  json_decode(json_encode($ret), true);
            //echo "<pre>";
            //print_r($this->data['records']); die;
            $this->load->view('master/material/material-edit',$this->data);
        }
    }
}
