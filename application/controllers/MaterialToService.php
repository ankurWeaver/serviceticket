<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MaterialToService extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('trn_raw_material_equip_model');
        $this->load->model('mst_raw_material_model');
        $this->load->model('mst_service_catalogue_model');
    }

    public function index() {
        $cond = " ORDER BY `a`.`trme_id` DESC";
        $selectQ = "a.*, b.mss_name,c.mrm_raw_material_name";
        $this->data['records'] = $this->trn_raw_material_equip_model->fetch_join($cond, $selectQ);
        //
        $this->data['avl_service_cat'] = $this->mst_service_catalogue_model->fetch();
        $this->data['avl_raw_mat'] = $this->mst_raw_material_model->fetch();

        if ($this->input->is_ajax_request()) {
            $responseArr = array(
                'retVal' => true,
                'resText' => $this->load->view('material-to-service/data-list', $this->data, true)
            );
            echo json_encode($responseArr);
        } else {
            //            
            $this->getCommonFiles();
            $this->load->view('material-to-service/material-to-service', $this->data);
        }
    }

    public function Add() {        
        if ($this->input->post('trme_mrm_id')) {
            $this->form_validation->set_rules('trme_msh_contract_id', 'Contract ID', 'trim|required');

            if ($this->form_validation->run() === FALSE) {
                $res = array(
                    'msg' => 'Validation failed!',
                    'ret' => 0
                );
                echo json_encode($res);
            } else {                
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
                //file_put_contents("materialtoservice.txt", print_r($addRec, TRUE));                
                $ret = $this->trn_raw_material_equip_model->add($addRec);
                if ($ret) {
                    $res = array(
                        'msg' => 'Material added to service suceesfully.',
                        'ret' => 1
                    );
                } else {
                    $res = array(
                        'msg' => 'Something went wrong.Please try again1.',
                        'ret' => 0
                    );
                }
            }
        } else {
            $res = array(
                'msg' => 'Something went wrong.Please try again2.',
                'ret' => 0
            );
        }
        echo json_encode($res);
    }

    public function edit($id = 0) {
        if (empty($id)) {
            redirect($this->data['base_url']);
        }

        if ($this->input->post('submit')) {
            $trme_mrm_id = $this->input->post('trme_mrm_id');
            $trme_tsbd_id = $this->input->post('trme_tsbd_id');
            $trme_item_qty = $this->input->post('trme_item_qty');
            $trme_ratio = $this->input->post('trme_ratio');
            $trme_msh_contract_id = $this->input->post('trme_msh_contract_id');
            //
            $updateRec = array(
                'trme_mrm_id' => $trme_mrm_id,
                'trme_tsbd_id' => $trme_tsbd_id,
                'trme_item_qty' => $trme_item_qty,
                'trme_ratio' => $trme_ratio,
                'trme_msh_contract_id' => $trme_msh_contract_id,
            );

            $ret = $this->trn_raw_material_equip_model->edit($updateRec, $id);
            redirect($this->data['base_url'] . 'materialtoservice/');
        } else {
            //fetch Total Record
            $condRec = " AND trme_id = '$id'";
            $this->data['row'] = $this->trn_raw_material_equip_model->fetch($condRec);
            //var_dump($this->data['row']); die;
            //fetch 
            $this->data['avl_service_cat'] = $this->mst_service_catalogue_model->fetch();
            $this->data['avl_raw_mat'] = $this->mst_raw_material_model->fetch();
            $this->getCommonFiles();
            $this->load->view('material-to-service/material-to-service-edit', $this->data);
        }
    }

    public function getServiceCatDetails() {
        $id = $this->input->post('serviceId');
        if (!empty($id)) {
            $cond = "AND `msc_id`='$id'";
            $fetcRec = $this->mst_service_catalogue_model->fetch($cond);

            if (!empty($fetcRec)) {
                $res = array(
                    'res' => $fetcRec[0],
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

    public function getMaterialDetails() {
        $id = $this->input->post('matId');
        if (!empty($id)) {
            $cond = "AND `mrm_id`='$id'";
            $fetcRec = $this->mst_raw_material_model->fetch($cond);

            if (!empty($fetcRec)) {
                $res = array(
                    'res' => $fetcRec[0],
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
