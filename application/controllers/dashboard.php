<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CORE_Controller {

    function __construct()
    {
        parent::__construct('');
        $this->validate_session();
    }

    public function index()
    {


        $data['_def_css_files']=$this->load->view('template\assets\css_files','',true);
        $data['_def_js_files']=$this->load->view('template\assets\js_files','',true);
        $data['_switcher_settings']=$this->load->view('template\elements\switcher','',true);
        $data['_side_bar_navigation']=$this->load->view('template\elements\side_bar_navigation','',true);
        $data['_top_navigation']=$this->load->view('template\elements\top_navigation','',true);

        $this->load->view('dashboard_view',$data);
    }
}
