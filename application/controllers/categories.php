<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class categories extends CORE_Controller {

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('categories_model');
//        $this->load->model('category_photos_model');
    }

    public function index() {
        $data['_def_css_files']=$this->load->view('template\assets\css_files','',true);
        $data['_def_js_files']=$this->load->view('template\assets\js_files','',true);
        $data['_switcher_settings']=$this->load->view('template\elements\switcher','',true);
        $data['_side_bar_navigation']=$this->load->view('template\elements\side_bar_navigation','',true);
        $data['_top_navigation']=$this->load->view('template\elements\top_navigation','',true);
        $data['title']='category Management';

        $this->load->view('categories_view',$data);
    }


    function transaction($txn=null) {
        switch($txn) {
            case 'list':
                $m_categories=$this->categories_model;
                $response['data']=$m_categories->get_category_list();
                echo json_encode($response);
                break;

            case 'create':
                $m_categories=$this->categories_model;
//                $m_photos=$this->category_photos_model;

                $m_categories->category_name=$this->input->post('category_name',TRUE);
                $m_categories->address=$this->input->post('address',TRUE);
                $m_categories->email_address=$this->input->post('email_address',TRUE);
                $m_categories->landline=$this->input->post('landline',TRUE);
                $m_categories->mobile_no=$this->input->post('mobile_no',TRUE);
                $m_categories->save();

                $category_id=$m_categories->last_insert_id();

//                $m_photos->category_id=$category_id;
//                $m_photos->photo_path=$this->input->post('photo_path',TRUE);
//                $m_photos->save();

                $response['title']='Success!';
                $response['stat']='Success';
                $response['msg']='category information successfully created.';
                $response['row_added']=$m_categories->get_category_list($category_id);
                echo json_encode($response);

                break;

//            case 'upload':
//                $allowed = array('png', 'jpg', 'jpeg','bmp');
//
//                $data=array();
//                $files=array();
//                $directory='assets/img/category/';
//
//                foreach($_FILES as $file) {
//                    $server_file_name=uniqid('');
//                    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
//                    $file_path=$directory.$server_file_name.'.'.$extension;
//                    $orig_file_name=$file['name'];
//
//                    if(!in_array(strtolower($extension), $allowed)) {
//                        $response['title']='Invalid!';
//                        $response['stat']='error';
//                        $response['msg']='Image is invalid. Please select a valid photo!';
//                        die(json_encode($response));
//                    }
//
//                    if(move_uploaded_file($file['tmp_name'],$file_path)) {
//                        $response['title']='Success!';
//                        $response['stat']='success';
//                        $response['msg']='Image successfully uploaded.';
//                        $response['path']=$file_path;
//                        echo json_encode($response);
//                    }
//
//                }
//
//                break;

        }
    }

//    function uploadimage() {
//
//    }

}
