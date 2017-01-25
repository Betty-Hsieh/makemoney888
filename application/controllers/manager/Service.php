<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Verify_model');
		$this->load->model('service_model');
		$this->load->library('general');
	}
	
	function index(){
		$this->general->init_page();
		
		$service=$this->service_model->get_service_list();
		$data['service']=$service->result();
		
		$this->load->view('admin/service_list.php',$data);
		$this->load->view('admin/footer');
	}
	
	function edit_service_page(){
		$this->general->init_page();
		
		$service=$this->service_model->get_service_list();
		$data['service']=$service->result();
		
		$this->load->view('admin/service_editing_page',$data);
		$this->load->view('admin/footer');
	}
	
	function adding_service(){
		$data=array(
			'title'=>$this->input->post('title'),
			'content'=>$this->input->post('content'),
			'author_id'=>$this->input->post('author'),
		);
		
		$rs=$this->service_model->add_service($data);
		redirect('/manager/Service');
	}
	
	function editing_service(){
		$data=array(
			'title'=>$this->input->post('title'),
			'content'=>$this->input->post('content'),
			'author_id'=>$this->input->post('author'),
		);
		$this->service_model->update_service($data,$id);
	}
	
	function delete_service($id){
		$rs=$this->service_model->delete_service($id);
		$data=array(
			'code'=>$rs
		);
		$this->output->set_output(json_encode($data));
	}
}
