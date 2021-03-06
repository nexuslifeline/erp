<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class products extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('products_model');
    }

    public function index() {
        $data['product_code'] = $this->products_model->getCode();
        $data['product_cat'] = $this->products_model->getCategory();
        $data['product_dept'] = $this->products_model->getDepartment();
        $data['product_unit'] = $this->products_model->getUnit();
        $data['_def_css_files'] = $this->load->view('template\assets\css_files', '', true);
        $data['_def_js_files'] = $this->load->view('template\assets\js_files', '', true);
        $data['_switcher_settings'] = $this->load->view('template\elements\switcher', '', true);
        $data['_side_bar_navigation'] = $this->load->view('template\elements\side_bar_navigation', '', true);
        $data['_top_navigation'] = $this->load->view('template\elements\top_navigation', '', true);
        $data['title'] = 'Product Management';

        $this->load->view('products_view', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $m_products = $this->products_model;
                $response['data'] = $m_products->get_product_list();
                echo json_encode($response);
                break;

            case 'create':
                $m_products = $this->products_model;

                $m_products->product_code = $this->input->post('product_code', TRUE);
                $m_products->product_desc = $this->input->post('product_desc', TRUE);
                $m_products->product_desc1 = $this->input->post('product_desc1', TRUE);
                $m_products->product_cat = $this->input->post('product_cat', TRUE);
                $m_products->product_dept = $this->input->post('product_dept', TRUE);
                $m_products->product_unit = $this->input->post('product_unit', TRUE);
                $m_products->product_vat = $this->input->post('product_vat', TRUE);
                $m_products->equivalent_points = $this->input->post('equivalent_points', TRUE);
                $m_products->product_warn = $this->input->post('product_warn', TRUE);
                $m_products->product_ideal = $this->input->post('product_ideal', TRUE);
                $m_products->purchase_cost = $this->input->post('purchase_cost', TRUE);
                $m_products->markup_percent = $this->input->post('markup_percent', TRUE);
                $m_products->sale_price = $this->input->post('sale_price', TRUE);
                $m_products->whole_sale = $this->input->post('whole_sale', TRUE);
                $m_products->retailer_price = $this->input->post('retailer_price', TRUE);
                $m_products->special_disc = $this->input->post('special_disc', TRUE);
                $m_products->valued_customer = $this->input->post('valued_customer', TRUE);
                $m_products->save();

                $product_id = $m_products->last_insert_id();

                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'product information successfully created.';
                $response['row_added'] = $m_products->get_product_list($product_id);
                echo json_encode($response);

                break;

            case 'delete':
                $m_products=$this->products_model;

                $product_id=$this->input->post('product_id',TRUE);

                $m_products->is_deleted=1;
                if($m_products->modify($product_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='product information successfully deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_products=$this->products_model;

                $product_id=$this->input->post('product_id',TRUE);
                $m_products->product_code = $this->input->post('product_code', TRUE);
                $m_products->product_desc = $this->input->post('product_desc', TRUE);
                $m_products->product_desc1 = $this->input->post('product_desc1', TRUE);
                $m_products->product_cat = $this->input->post('product_cat', TRUE);
                $m_products->product_dept = $this->input->post('product_dept', TRUE);
                $m_products->product_unit = $this->input->post('product_unit', TRUE);
                $m_products->product_vat = $this->input->post('product_vat', TRUE);
                $m_products->equivalent_points = $this->input->post('equivalent_points', TRUE);
                $m_products->product_warn = $this->input->post('product_warn', TRUE);
                $m_products->product_ideal = $this->input->post('product_ideal', TRUE);
                $m_products->purchase_cost = $this->input->post('purchase_cost', TRUE);
                $m_products->markup_percent = $this->input->post('markup_percent', TRUE);
                $m_products->sale_price = $this->input->post('sale_price', TRUE);
                $m_products->whole_sale = $this->input->post('whole_sale', TRUE);
                $m_products->retailer_price = $this->input->post('retailer_price', TRUE);
                $m_products->special_disc = $this->input->post('special_disc', TRUE);
                $m_products->valued_customer = $this->input->post('valued_customer', TRUE);

                $m_products->modify($product_id);

                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='product information successfully updated.';
                $response['row_updated']=$m_products->get_product_list($product_id);
                echo json_encode($response);

                break;
        }
    }
}
