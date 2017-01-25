<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Verify_model');
		$this->load->model('contact_model');
		$this->load->library('general');
        $this->load->library('FileUpload');
	}

	
	function index(){
		$this->general->init_page();
        
        $where['fid']=$this->session->userdata('fid');
        $data['contact']=$this->contact_model->get_contact_data($where);
        //print_r($data);
        
		if($data['contact']!=NULL){
            $this->load->view('admin/contact_editing_page.php',$data);
		}
        else{
            $this->load->view('admin/contact_adding_page.php',$data);
        }
		$this->load->view('admin/footer');
	}
	
    
    function adding_contact(){
		$data=array(
			'status'=>1,
            'uniqid_id' => uniqid(),
            'content'=>$this->input->post('content'),
            'type' => 'ContactUS',
            'fid'=>$this->session->userdata('fid'),
		);
		
		$rs=$this->contact_model->add_contact($data);
		redirect('/manager/Contact/');
	}
	
	function editing_contact(){
		$id=$this->input->post('uniqid_id');
		$data=array(
			'content'=>$this->input->post('content'),
		);
      
		$this->contact_model->update_contact($data,$id);
		redirect('/manager/Contact/');
	}
	
}
