<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class locations extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('locations_model');
    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template\assets\css_files', '', true);
        $data['_def_js_files'] = $this->load->view('template\assets\js_files', '', true);
        $data['_switcher_settings'] = $this->load->view('template\elements\switcher', '', true);
        $data['_side_bar_navigation'] = $this->load->view('template\elements\side_bar_navigation', '', true);
        $data['_top_navigation'] = $this->load->view('template\elements\top_navigation', '', true);
        $data['title'] = 'Location Management';

        $this->load->view('locations_view', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $m_locations = $this->locations_model;
                $response['data'] = $m_locations->get_location_list();
                echo json_encode($response);
                break;

            case 'create':
                $m_locations = $this->locations_model;

                $m_locations->location_name = $this->input->post('location_name', TRUE);
                $m_locations->save();

                $location_id = $m_locations->last_insert_id();

                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'location information successfully created.';
                $response['row_added'] = $m_locations->get_location_list($location_id);
                echo json_encode($response);

                break;

            case 'delete':
                $m_locations=$this->locations_model;

                $location_id=$this->input->post('location_id',TRUE);

                $m_locations->is_deleted=1;
                if($m_locations->modify($location_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='location information successfully deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_locations=$this->locations_model;

                $location_id=$this->input->post('location_id',TRUE);
                $m_locations->location_name=$this->input->post('location_name',TRUE);

                $m_locations->modify($location_id);

                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='location information successfully updated.';
                $response['row_updated']=$m_locations->get_location_list($location_id);
                echo json_encode($response);

                break;
        }
    }
}
