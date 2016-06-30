<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class units extends CORE_Controller {
    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('units_model');
    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template\assets\css_files', '', true);
        $data['_def_js_files'] = $this->load->view('template\assets\js_files', '', true);
        $data['_switcher_settings'] = $this->load->view('template\elements\switcher', '', true);
        $data['_side_bar_navigation'] = $this->load->view('template\elements\side_bar_navigation', '', true);
        $data['_top_navigation'] = $this->load->view('template\elements\top_navigation', '', true);
        $data['title'] = 'unit Management';

        $this->load->view('units_view', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $m_units = $this->units_model;
                $response['data'] = $m_units->get_unit_list();
                echo json_encode($response);
                break;

            case 'create':
                $m_units = $this->units_model;

                $m_units->unit_code = $this->input->post('unit_code', TRUE);
                $m_units->unit_name = $this->input->post('unit_name', TRUE);
                $m_units->unit_desc = $this->input->post('unit_desc', TRUE);
                $m_units->save();

                $unit_id = $m_units->last_insert_id();

                $response['title'] = 'Success!';
                $response['stat'] = 'Success';
                $response['msg'] = 'unit information successfully created.';
                $response['row_added'] = $m_units->get_unit_list($unit_id);
                echo json_encode($response);

                break;

            case 'delete':
                $m_units=$this->units_model;

                $unit_id=$this->input->post('unit_id',TRUE);

                $m_units->is_deleted=1;
                if($m_units->modify($unit_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='unit information successfully deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_units=$this->units_model;

                $unit_id=$this->input->post('unit_id',TRUE);
                $m_units->unit_code=$this->input->post('unit_code',TRUE);
                $m_units->unit_name=$this->input->post('unit_name',TRUE);
                $m_units->unit_desc=$this->input->post('unit_desc',TRUE);

                $m_units->modify($unit_id);

                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='unit information successfully updated.';
                $response['row_updated']=$m_units->get_unit_list($unit_id);
                echo json_encode($response);

                break;
        }
    }
}
