<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Verify_model');
		$this->load->model('about_model');
		$this->load->library('general');
	}

	
	function index(){
		$this->general->init_page();
        
        $where['fid']=$this->session->userdata('fid');
        $data['about']=$this->about_model->get_about_data($where);
        //print_r($data);
		if($data['about']!=NULL){
            $this->load->view('admin/about_editing_page.php',$data);
		}
        else{
            $this->load->view('admin/about_adding_page.php',$data);
        }
		$this->load->view('admin/footer');
	}
	
    
    function adding_about(){
		$data=array(
			'status'=>1,
            'uniqid_id' => uniqid(),
            'content'=>$this->input->post('content'),
            'type' => 'about',
            'fid'=>$this->session->userdata('fid'),
		);
		
		$rs=$this->about_model->add_about($data);
		redirect('/manager/about/');
	}
	
	function editing_about(){
		$id=$this->input->post('uniqid_id');
		$data=array(
			'content'=>$this->input->post('content'),
		);
      
		$this->about_model->update_about($data,$id);
		redirect('/manager/about/');
	}
	
}
