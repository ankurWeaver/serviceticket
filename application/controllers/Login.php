<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mst_users_model');
        $this->load->model('mst_company_model');
    }

    public function index() {
        $this->load->view('login/login', $this->data);
    }

    public function logIn() {
        if (!$this->input->is_ajax_request()) {
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
            if ($this->form_validation->run() === FALSE) {
                $this->session->set_flashdata('auth_failed', 'Wrong user details!');
                redirect($this->data['base_url'] . 'login');
            } else {

                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $mu_type = $this->input->post('mu_type');
                $cond = " AND `mu_username`='$username' AND mu_type ='$mu_type'  AND `mu_enable`='1'";
                $userDetails = $this->mst_users_model->fetch($cond);
                $encVal = md5($password);

                if (sizeof($userDetails) > 0) {
                    if ($userDetails[0]['mu_password'] === md5($password)) {
                        $email = $userDetails[0]['mu_email'];
                        $id = $userDetails[0]['mu_id'];
                        $full_name = $userDetails[0]['mu_name'];
                        $companyCode = $userDetails[0]['mu_company_code'];
                        //
                        $userKeyVal = base64_encode($id);
                        $this->session->set_userdata('userKeyVal', $userKeyVal);
                        $this->session->set_userdata('muType', $mu_type);
                        $this->session->set_userdata('fullName', $full_name);
                        $this->session->set_userdata('company_code', $companyCode);
                        $this->session->set_userdata('auth_success', 'Welcome ' . $full_name);
                        $this->session->set_userdata('auth_application', 'Welcome to Service ticket Application!');
                        //t($this->session->userdata,1);
                        redirect($this->data['base_url'] . 'dashboard');
                    } else {
                        $this->session->set_flashdata('auth_failed', 'Wrong username/password!');
                        redirect($this->data['base_url'] . 'login');
                    }
                } else {
                    $this->session->set_flashdata('auth_failed', 'User not found');
                    redirect($this->data['base_url'] . 'login');
                }
            }
        } else {
            show_404();
        }
    }

    public function forget_pass() {
        $this->load->view('login/forget_pass', $this->data);
    }

    public function signUp() {
       $this->load->view('login/user-registration', $this->data);
       
    }
    public function userRegistration() { 
        if ($this->input->post()) {
            $this->form_validation->set_rules('mu_company_code', 'Company Code', 'trim|required');

            if ($this->form_validation->run() === FALSE) {
                $res = array(
                    'msg' => 'Validation failed!',
                    'ret' => 0
                );
                echo json_encode($res);
            } else {         
                
                $mu_company_code = trim($this->input->post('mu_company_code'));
                //first check if the company does not exists will return back.
                $condCompCode = " AND mc_code='$mu_company_code'";
                $countCompany = $this->mst_company_model->count_all_cond($condCompCode);
                if($countCompany <= 0){
                    //return with falure
                    $res = array(
                        'msg' => 'Compnay code not found.',
                        'ret' => 0
                    );
                   echo json_encode($res);
                   return;
                }
                $mu_username = trim($this->input->post('mu_username'));
                //check uplicate user [user name will be mobile no]
                $condEmp = " AND mu_username='$mu_username'";
                $countEmp = $this->mst_users_model->count_all_cond($condEmp);
                if($countEmp > 0){
                    //return with falure
                    $res = array(
                        'msg' => 'User already exists.',
                        'ret' => 0
                    );
                   echo json_encode($res);
                   return;
                }
                
                $mu_type = trim($this->input->post('mu_type'));                
                $mu_password = trim($this->input->post('mu_password'));
                $mu_name = trim($this->input->post('mu_name'));
                $mu_email = trim($this->input->post('mu_email'));
                $mu_mob = trim($this->input->post('mu_mob'));
                $mu_gst = trim($this->input->post('mu_gst'));
                $mu_pan = trim($this->input->post('mu_pan'));
                //
                $mu_password = md5($mu_password);
                $addRec = array(
                    'mu_company_code'=>$mu_company_code,
                    'mu_type' => $mu_type,
                    'mu_username' => $mu_username,
                    'mu_password' => $mu_password,
                    'mu_name' => $mu_name,
                    'mu_email' => $mu_email,
                    'mu_mob' => $mu_mob,
                    'mu_gst' => $mu_gst,
                    'mu_pan' => $mu_pan,
                    'mu_enable'=>'1',
                    'mu_access'=>'NA'   
                );   
                //file_put_contents("materialtoservice.txt", print_r($addRec, TRUE));                
                $ret = $this->mst_users_model->add($addRec);
                if ($ret) {
                    $res = array(
                        'msg' => 'User added suceesfully.',
                        'ret' => 1
                    );
                } else {
                    $res = array(
                        'msg' => 'Something went wrong.Please try again.',
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
    //
    public function logout() {
        $this->session->unset_userdata('userKeyVal');
        $this->session->unset_userdata('fullName');
        $this->session->unset_userdata('auth_success');
        $this->session->unset_userdata('auth_application');
        $this->session->set_flashdata('log_out', 'Successfully logged out from Application!');
        redirect($this->data['base_url']);
    }

}
