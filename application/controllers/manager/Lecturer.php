<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lecturer extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Verify_model');
		$this->load->library('general');
		$this->load->model('Lecturer_model');
	}
	
	public function index(){
		$this->general->init_page();
		$Lecturer_list=$this->Lecturer_model->get_Lecturer_list();
		$data['Lecturer']=$Lecturer_list->result();
        
		$this->load->view('admin/lecturer_list',$data);
		$this->load->view('admin/footer');
	}
	
	public function add_Lecturer_page(){
		$this->load->view('admin/Lecturer_add_page');
	}
	
	public function add_Lecturer(){
		$data = array(
		   'org_name' => $this->input->post('org_name'),
		   'org_password' => $this->input->post('org_password'),
		   'org_email' => $this->input->post('org_email'),
           'nickname' => $this->input->post('nickname')
		);
		
		$this->Lecturer_model->add_Lecturer($data);
		redirect('/Lecturer');
	}
	
	public function edit_Lecturer_page($id){
	    $this->general->init_page();
		$Lecturer_one=$this->Lecturer_model->get_Lecturer_one($id);
		$data['Lecturer']=$Lecturer_one->result();
		$data['id']=$id;
		$this->load->view('admin/Lecturer_update_page',$data);	
        $this->load->view('admin/footer');	
	}
	
	public function update_Lecturer(){
		$data = array(
		   'org_name' => $this->input->post('org_name'),
		   'org_password' => $this->input->post('org_password'),
		   'org_email' => $this->input->post('org_email'),
		   'nickname' => $this->input->post('nickname')
		);
		$id=$this->input->post('id');		
		$this->Lecturer_model->update_Lecturer($data,$id);
		redirect('/Lecturer');
	}
	
	public function delete_Lecturer($id){
		$rs=$this->Lecturer_model->delete_Lecturer($id);
		$data=array(
			'code'=>$rs
		);
		$this->output->set_output(json_encode($data));
	}
}
