<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Performance extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Verify_model');
        $this->load->model('performance_model');
        $this->load->library('general');
    }

    function index()
    {
        $this->general->init_page();
        
        $where['start']=$this->input->post('start');
        $where['end']=$this->input->post('end');
        $performance=$this->performance_model->get_performance_list($where);
        $data['performance']=$performance->result();
        
        $this->load->view('admin/performance.php',$data);
        $this->load->view('admin/footer');
    }

    
    
    function Query_Product(){
        $where=array(
            'product_name'=>$this->input->post('product')
        );
        $product = $this->product_model->query_product($where);
        $data['product'] = $product->result();
        echo json_encode($data);
    }

}
