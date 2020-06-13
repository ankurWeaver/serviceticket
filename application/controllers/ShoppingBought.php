<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ShoppingBought extends MY_Controller {

    public function __construct() {
       parent::__construct();
       $this->load->model('shopping_bouget_detail_model');
       
    }
    public function index()
    {
        
        $selectRec = "`a`.`tsbd_id`,`a`.`tsbd_onsite_supervisor_name`,a.tsbd_onsite_mgr_name,a.tsbd_is_explode,b.tsbh_id,b.tsbh_contract_id,b.tsbh_status";
        $noOfRecords = $this->shopping_bouget_detail_model->count_all_cond_join();
        $totalRec = $this->shopping_bouget_detail_model->fetch_join('',$selectRec);
        $this->data['records']= $totalRec;
        //echo '<pre>';
        //print_r($this->data['records']);die;
       
        $this->load->view('shopping-bought/shopping-bought',$this->data);
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
            redirect($this->data['base_url'].'shoppingbought');
            
        } else {
            $this->load->view('shopping-bought/shopping-bought-add',$this->data);
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
            redirect($this->data['base_url'].'shoppingbought');
            
        } else {
           
            //echo "<pre>";
            //print_r($this->data['records']); die;
            $this->load->view('shopping-bought/shopping-bought-edit',$this->data);
        }
    }
}
