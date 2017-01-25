<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipping extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Verify_model');
		$this->load->model('shipping_model');
		$this->load->library('general');
	}
	
	function index(){
		$this->general->init_page();
        $where['fkey']="shipping";
        $where['fid']=$this->session->userdata('fid');
        
		$shipping=$this->shipping_model->get_shipping_list($where);
		$data['shipping']=$shipping->result();
        
		$this->load->view('admin/shipping.php',$data);
		$this->load->view('admin/footer');
	}
	
	function shipping_add_page(){
		$this->general->init_page();
		$this->load->view('admin/shipping_adding_page');
		$this->load->view('admin/footer');
	}
	
	function shipping_editing_page($id=""){
		$this->general->init_page();
		$shipping=$this->shipping_model->get_shipping_one($id);
		$data['shipping']=$shipping->result();
		
		$this->load->view('admin/shipping_editing_page',$data);
		$this->load->view('admin/footer');
	}
	
	function shipping_adding(){
	    $fid=$this->session->userdata('fid');
		$data=array(
			'fvalue'=>$this->input->post('title'),
            'fvalue2'=>$this->input->post('amount'),
            'status'=>$this->input->post('status'),
            'fkey'=>"shipping",
            'fid'=>$fid,
		);
		$this->shipping_model->add_shipping($data);
		redirect('/manager/Shipping');
	}
	
	function editing_shipping(){
	    $id=$this->input->post('id');
		$data=array(
			'fvalue'=>$this->input->post('title'),
            'fvalue2'=>$this->input->post('amount'),
            'status'=>$this->input->post('status'),
            'fid'=>$fid,
		);
		$this->shipping_model->update_shipping($data,$id);
        redirect('/manager/Shipping');
	}
	
	function delete_shipping($id){
		$rs=$this->shipping_model->delete_shipping($id);
		$data=array(
			'code'=>$rs
		);
		$this->output->set_output(json_encode($data));
	}
}
