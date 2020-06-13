<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MapMaterialToService extends MY_Controller {

    public function __construct() {
       parent::__construct();
       $this->load->model('trn_raw_material_equip_model');
       $this->load->model('mst_raw_material_model');
       $this->load->model('mst_service_catalogue_model');
       
       
    }
    public function index()
    {
       $cond = " ORDER BY trme_id DESC";
       $this->data['records'] = $this->trn_raw_material_equip_model->fetch($cond);
       $this->load->view('material-to-service/material-to-service',$this->data);
     
    }
    public function add()
    {
        
        if ($this->input->post('submit')) {
            $trme_mrm_id = $this->input->post('trme_mrm_id');
            $trme_tsbd_id = $this->input->post('trme_tsbd_id');
            $trme_item_qty = $this->input->post('trme_item_qty');
            $trme_ratio = $this->input->post('trme_ratio');
            $trme_msh_contract_id = $this->input->post('trme_msh_contract_id');
            //
            $addRec = array(
                'trme_mrm_id' => $trme_mrm_id, 
                'trme_tsbd_id' => $trme_tsbd_id, 
                'trme_item_qty' => $trme_item_qty, 
                'trme_ratio' => $trme_ratio,
                'trme_msh_contract_id' => $trme_msh_contract_id,
            );
            
            $ret = $this->trn_raw_material_equip_model->add($addRec);     
            redirect($this->data['base_url']);
            
        } else {
            //fetch 
            $this->data['avl_service_cat'] = $this->mst_service_catalogue_model->fetch();            
            $this->data['avl_raw_mat'] = $this->mst_raw_material_model->fetch();
            $this->getCommonFiles();
            $this->load->view('material-to-service/material-to-service-add',$this->data);
        }
    }
    
    public function edit($id=0)
    {
        
        if ($this->input->post('submit')) {
            $trme_mrm_id = $this->input->post('trme_mrm_id');
            $trme_tsbd_id = $this->input->post('trme_tsbd_id');
            $trme_item_qty = $this->input->post('trme_item_qty');
            $trme_ratio = $this->input->post('trme_ratio');
            $trme_msh_contract_id = $this->input->post('trme_msh_contract_id');
            //
            $params = array(
                'trme_mrm_id' => $trme_mrm_id, 
                'trme_tsbd_id' => $trme_tsbd_id, 
                'trme_item_qty' => $trme_item_qty, 
                'trme_ratio' => $trme_ratio,
                'trme_msh_contract_id' => $trme_msh_contract_id,
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
    
    public function getServiceCatDetails()
    {
        $id = $this->input->post('serviceId');
        if(!empty($id)) {           
                $cond = "AND `msc_id`='$id'";                
                $fetcRec = $this->mst_service_catalogue_model->fetch($cond);
          
            if(!empty($fetcRec)) {
                $res = array(
                    'res'=>$fetcRec[0],
                    'ret' => 1
                );
            } else {
                $res = array(
                    'message' => 'Something went wrong.Please try again.',
                    'st' => 0
                );
            }
        } else {
            $res = array(
                'message' => 'Something went wrong.Please try again.',
                'st' => 0
            );
        }
        echo json_encode($res);
    }
    
    public function getMaterialDetails()
    {
        $id = $this->input->post('matId');
        if(!empty($id)) {           
                $cond = "AND `mrm_id`='$id'";                
                $fetcRec = $this->mst_raw_material_model->fetch($cond);
          
            if(!empty($fetcRec)) {
                $res = array(
                    'res'=>$fetcRec[0],
                    'ret' => 1
                );
            } else {
                $res = array(
                    'message' => 'Something went wrong.Please try again.',
                    'st' => 0
                );
            }
        } else {
            $res = array(
                'message' => 'Something went wrong.Please try again.',
                'st' => 0
            );
        }
        echo json_encode($res);
    }
}
