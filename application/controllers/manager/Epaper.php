<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Epaper extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->model('Verify_model');
		$this->load->library('general');
		$this->load->model('epaper_model');
	}
	
    function index(){
	    $this->general->init_page();
		$epaper_list=$this->epaper_model->get_epaper_list();
		$data['epaper_list']=$epaper_list->result();
		$this->load->view('admin/epaper_list',$data);
        $this->load->view('admin/footer');
	}
    
    function epaper_adding_page(){
        $this->general->init_page();
		$this->load->view('admin/epaper_adding_page');
        $this->load->view('admin/footer');
    }
	
    function edit_epaper_page($uniqid){
        $this->general->init_page();
		$news=$this->epaper_model->get_epaper_one($uniqid);
		$data['epaper']=$news->result();
		
		$this->load->view('admin/epaper_edit_page',$data);
		$this->load->view('admin/footer');
	}
    
    function adding_epaper(){
	    $fid=$this->session->userdata('fid');
		$data=array(
			'title'=>$this->input->post('title'),
			'content'=>$this->input->post('content'),
            'm_factoryID'=>$fid,
            'uniqid' => uniqid(),
		);
		$this->epaper_model->add_epaper($data);
		redirect('/manager/Epaper');
	}
	
	function editing_epaper(){
	    $id=$this->input->post('id');
		$data=array(
            'topic'=>$this->input->post('topic'),
			'content'=>$this->input->post('content'),
		);
		$this->epaper_model->update_epaper($data,$id);
        redirect('/manager/Epaper');
	}
    
    function send_epaper(){
		$id=$this->input->post('id');
		$epaper_one=$this->epaper_model->get_epaper_one($id);
		$data['epaper_one']=$epaper_one->result();
		
		foreach($data['epaper_one'] as $key=>$row){
			$info = array(
				'list' => array("s8220836@gmail.com","a0933786266@gmail.com"),
				'title' => $row->title,
				'content' => $row->content,
			);
		}
        $msg = $this->send_email($info);
        print_r($msg);
	}
    
    function send_email($data=""){
        
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'drwateri80@gmail.com',
            'smtp_pass' => 'i80isthebest',
            'mailtype'  => 'html', 
            'charset'   => 'utf-8'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        
        $this->email->from('sevice@soap.com','手工皂');
        $this->email->to("a0933786266@gmail.com");
        $this->email->subject($data['title']);
        $this->email->message($data['content']);
        
        if($this->email->send()){
            return 'Your email was sent';
        }
        else{
            return $this->email->print_debugger();
        }
    }
	
}
