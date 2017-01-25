<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Verify_model');
		$this->load->library('general');
		$this->load->model('student_model');
        $this->load->model('customertype_model');
	}
	
	public function index(){
		$this->general->init_page();
		$student_list=$this->student_model->get_student_list();
		$data['student']=$student_list->result();
        
		$this->load->view('admin/students_list',$data);
		$this->load->view('admin/footer');
	}
	/*
	public function add_student_page(){
	    $this->general->init_page();
		$this->load->view('admin/student_adding_page');
        $this->load->view('admin/footer');
	}
	
	public function add_student(){
		$data = array(
		   'org_name' => $this->input->post('org_name'),
		   'org_password' => $this->input->post('org_password'),
		   'org_email' => $this->input->post('org_email'),
           'nickname' => $this->input->post('nickname')
		);
		
		$this->student_model->add_student($data);
		redirect('/manager/Students');
	}
	*/
	public function edit_student_page($id){
	    $this->general->init_page();
		$student_one=$this->student_model->get_student_one($id);
		$data['student']=$student_one->result();
		$data['id']=$id;
        
        //客戶分類
        $customer_type=$this->customertype_model->get_customertype_list();
        $data['cus_type']=$customer_type->result();
        
		$this->load->view('admin/student_update_page',$data);	
        $this->load->view('admin/footer');	
	}
	
	public function edit_student(){
		$data = array(
		   'org_name' => $this->input->post('org_name'),
		   'org_password' => $this->input->post('org_password'),
		   'org_email' => $this->input->post('org_email'),
		   'cellphone' => $this->input->post('cellphone'),
           'epaper_status' => $this->input->post('epaper_status'),
           'gender' => $this->input->post('gender'),
           'status' => $this->input->post('status'),
           'address' => $this->input->post('address'),
           'classtype' => $this->input->post('classtype'),
		);
		$id=$this->input->post('id');		
		$this->student_model->update_student($data,$id);
		redirect('/manager/Students');
	}
	
	public function delete_student($id){
		$rs=$this->student_model->delete_student($id);
		$data=array(
			'code'=>$rs
		);
		$this->output->set_output(json_encode($data));
	}
}
