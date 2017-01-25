<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Verify_model');
		$this->load->model('news_model');
		$this->load->library('general');
	}
	
	function index(){
		$this->general->init_page();
        
        $where['fid']=$this->session->userdata('fid');
        
		$news=$this->news_model->get_news_list($where);
		$data['news']=$news->result();
        
		$this->load->view('admin/news_list.php',$data);
		$this->load->view('admin/footer');
	}
	
	function adding_news_page(){
		$this->general->init_page();
		$this->load->view('admin/news_adding_page');
		$this->load->view('admin/footer');
	}
	
	function news_editing_page($id=""){
		$this->general->init_page();
		$news=$this->news_model->get_news_one($id);
		$data['news']=$news->result();
		
		$this->load->view('admin/news_editing_page',$data);
		$this->load->view('admin/footer');
	}
	
	function adding_news(){
	    $fid=$this->session->userdata('fid');
		$data=array(
			'title'=>$this->input->post('title'),
			'content'=>$this->input->post('content'),
            'fid'=>$fid,
            'type'=>"News",
            'menu_id'=>1
		);
		$this->news_model->add_news($data);
		redirect('/manager/News');
	}
	
	function editing_news(){
	    $id=$this->input->post('id');
		$data=array(
            'title'=>$this->input->post('title'),
			'content'=>$this->input->post('content'),
            'status'=>$this->input->post('status'),
		);
		$this->news_model->update_news($data,$id);
        redirect('/manager/News');
	}
	
	function delete_news($id){
		$rs=$this->news_model->delete_news($id);
		$data=array(
			'code'=>$rs
		);
		$this->output->set_output(json_encode($data));
	}
}
