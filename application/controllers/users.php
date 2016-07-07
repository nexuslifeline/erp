<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('users_model');
        $this->load->model('user_groups_model');
    }

    public function index() {

        $data['_def_css_files'] = $this->load->view('template\assets\css_files', '', true);
        $data['_def_js_files'] = $this->load->view('template\assets\js_files', '', true);
        $data['_switcher_settings'] = $this->load->view('template\elements\switcher', '', true);
        $data['_side_bar_navigation'] = $this->load->view('template\elements\side_bar_navigation', '', true);
        $data['_top_navigation'] = $this->load->view('template\elements\top_navigation', '', true);
        $data['user_groups']=$this->user_groups_model->get_list();
        $data['title'] = 'User Account Management';

        $this->load->view('users_view', $data);
    }

    function transaction($txn = null) {

        switch($txn){
            case 'list':
                $m_users=$this->users_model;
                $response['data']=$m_users->get_user_list();
                echo json_encode($response);
                break;
            case 'create':
                $m_users=$this->users_model;
                $m_users->user_name=$this->input->post('user_name',TRUE);
                $m_users->user_pword=sha1($this->input->post('user_pword',TRUE));
                $m_users->user_lname=$this->input->post('user_lname',TRUE);
                $m_users->user_fname=$this->input->post('user_fname',TRUE);
                $m_users->user_mname=$this->input->post('user_mname',TRUE);
                $m_users->user_address=$this->input->post('user_address',TRUE);
                $m_users->user_email=$this->input->post('user_email',TRUE);
                $m_users->user_mobile=$this->input->post('user_mobile',TRUE);
                $m_users->user_telephone=$this->input->post('user_telephone',TRUE);
                $m_users->user_bdate=date('Y-m-d',strtotime($this->input->post('user_bdate',TRUE)));
                $m_users->save();

                $useraccountid=$m_users->last_insert_id();

                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='User account information successfully created.';
                $response['row_added']=$m_users->get_user_list($useraccountid);
                echo json_encode($response);

                break;
        }


    }
}
