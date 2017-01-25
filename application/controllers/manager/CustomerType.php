<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerType extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Verify_model');
		$this->load->library('general');
		$this->load->model('customertype_model');
	}
	
	public function index(){
		$this->general->init_page();
		$customertype_list=$this->customertype_model->get_customertype_list();
		$data['customertype']=$customertype_list->result();
		$this->load->view('admin/customertype_list',$data);
		$this->load->view('admin/footer');
	}
	
	public function add_customertype_page(){
	    $this->general->init_page();
		$this->load->view('admin/customertype_adding_page');
        $this->load->view('admin/footer');
	}
	
	public function add_customertype(){
		$data = array(
		   'title' => $this->input->post('title')
		);
		
		$this->customertype_model->add_customertype($data);
		redirect('/manager/CustomerType');
	}
	
	public function edit_customertype_page($id){
	    $this->general->init_page();
		$customertype_one=$this->customertype_model->get_customertype_one($id);
		$data['customertype']=$customertype_one->result();
		$data['id']=$id;
        
		$this->load->view('admin/customertype_update_page',$data);	
        $this->load->view('admin/footer');	
	}
	
	public function edit_customertype(){
		$data = array(
		   'title' => $this->input->post('title')
		);
		$id=$this->input->post('id');		
		$this->customertype_model->update_customertype($data,$id);
		redirect('/manager/CustomerType');
	}
	
	public function delete_customertype($id){
		$rs=$this->customertype_model->delete_customertype($id);
		$data=array(
			'code'=>$rs
		);
		$this->output->set_output(json_encode($data));
	}
}
