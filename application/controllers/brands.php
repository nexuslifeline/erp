<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class brands extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('brands_model');
    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template\assets\css_files', '', true);
        $data['_def_js_files'] = $this->load->view('template\assets\js_files', '', true);
        $data['_switcher_settings'] = $this->load->view('template\elements\switcher', '', true);
        $data['_side_bar_navigation'] = $this->load->view('template\elements\side_bar_navigation', '', true);
        $data['_top_navigation'] = $this->load->view('template\elements\top_navigation', '', true);
        $data['title'] = 'Brand Management';

        $this->load->view('brands_view', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $m_brands = $this->brands_model;
                $response['data'] = $m_brands->get_brand_list();
                echo json_encode($response);
                break;

            case 'create':
                $m_brands = $this->brands_model;

                $m_brands->brand_name = $this->input->post('brand_name', TRUE);
                $m_brands->save();

                $brand_id = $m_brands->last_insert_id();

                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'brand information successfully created.';
                $response['row_added'] = $m_brands->get_brand_list($brand_id);
                echo json_encode($response);

                break;

            case 'delete':
                $m_brands=$this->brands_model;

                $brand_id=$this->input->post('brand_id',TRUE);

                $m_brands->is_deleted=1;
                if($m_brands->modify($brand_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='brand information successfully deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_brands=$this->brands_model;

                $brand_id=$this->input->post('brand_id',TRUE);
                $m_brands->brand_name=$this->input->post('brand_name',TRUE);

                $m_brands->modify($brand_id);

                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='brand information successfully updated.';
                $response['row_updated']=$m_brands->get_brand_list($brand_id);
                echo json_encode($response);

                break;
        }
    }
}
