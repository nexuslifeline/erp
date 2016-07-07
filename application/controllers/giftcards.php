<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class giftcards extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('giftcards_model');
    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template\assets\css_files', '', true);
        $data['_def_js_files'] = $this->load->view('template\assets\js_files', '', true);
        $data['_switcher_settings'] = $this->load->view('template\elements\switcher', '', true);
        $data['_side_bar_navigation'] = $this->load->view('template\elements\side_bar_navigation', '', true);
        $data['_top_navigation'] = $this->load->view('template\elements\top_navigation', '', true);
        $data['title'] = 'Gift Card Management';

        $this->load->view('giftcards_view', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $m_giftcards = $this->giftcards_model;
                $response['data'] = $m_giftcards->get_giftcard_list();
                echo json_encode($response);
                break;

            case 'create':
                $m_giftcards = $this->giftcards_model;

                $m_giftcards->giftcard_name = $this->input->post('giftcard_name', TRUE);
                $m_giftcards->save();

                $giftcard_id = $m_giftcards->last_insert_id();

                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'giftcard information successfully created.';
                $response['row_added'] = $m_giftcards->get_giftcard_list($giftcard_id);
                echo json_encode($response);

                break;

            case 'delete':
                $m_giftcards=$this->giftcards_model;

                $giftcard_id=$this->input->post('giftcard_id',TRUE);

                $m_giftcards->is_deleted=1;
                if($m_giftcards->modify($giftcard_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='giftcard information successfully deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_giftcards=$this->giftcards_model;

                $giftcard_id=$this->input->post('giftcard_id',TRUE);
                $m_giftcards->giftcard_name=$this->input->post('giftcard_name',TRUE);

                $m_giftcards->modify($giftcard_id);

                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='giftcard information successfully updated.';
                $response['row_updated']=$m_giftcards->get_giftcard_list($giftcard_id);
                echo json_encode($response);

                break;
        }
    }
}
