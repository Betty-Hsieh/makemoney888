<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Verify_model');
		$this->load->model('faq_model');
        $this->load->model('member_model');
		$this->load->library('general');
	}
	
    function index(){
		$this->general->init_page();
		$where['fid']=$this->session->userdata('fid');
		$faq=$this->faq_model->get_faq_list($where);
		$data['faq']=$faq->result();
        
		$this->load->view('admin/faq_list.php',$data);
		$this->load->view('admin/footer');
	}
	
	function adding_faq_page(){
		$this->general->init_page();
        
		$this->load->view('admin/faq_adding_page');
		$this->load->view('admin/footer');
	}
	
	function edit_faq_page($id=""){
		$this->general->init_page();
        
		$faq=$this->faq_model->get_faq_one($id);
		$data['faq']=$faq->result();
		
		$this->load->view('admin/faq_editing_page',$data);
		$this->load->view('admin/footer');
	}
	
	function adding_faq(){
		$data=array(
			'title'=>$this->input->post('title'),
			'content'=>$this->input->post('content'),
			'status'=>1,
            'menu_id'=>9,
            'fid'=>$this->session->userdata('fid'),
            'uniqid_id' => uniqid(),
            'type' => 'faq',
		);
       
		$rs=$this->faq_model->add_faq($data);
		redirect('/manager/faq');
	}
	
	function editing_faq(){
		$id=$this->input->post('uniqid_id');
		$data=array(
			'title'=>$this->input->post('title'),
			'content'=>$this->input->post('content'),
			'status'=>$this->input->post('status'),
		);
      
        //print_r($upload_info);
		$this->faq_model->update_faq($data,$id);
		redirect('/manager/faq');
	}
   
	function delete_faq($id){
		$rs=$this->faq_model->delete_faq($id);
		$data=array(
			'code'=>$rs
		);
		$this->output->set_output(json_encode($data));
        redirect('/manager/faq');
	}
}
